<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Page;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PagesController extends Controller {

   public function __construct() {
      $this->middleware('auth');
      $this->middleware('isadmin')->only(['create', 'store']);
   }

   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Page $page = null) {

      if (!empty($page)) {
         $rows = Page::where('page_id', $page->id)->get();
      } else {
         $rows = Page::where('page_id', '0')->get();
      }
      
      return view('admin.pages.index', compact(['rows', 'page']));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create() {
//      $pagesTopLevel = Page::toplevel()
//              ->notdeleted()   
//              ->get();
      $pagesTopLevel = $this->pagesTopLevel();

      return view('admin.pages.create', compact('pagesTopLevel'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request) {
      // Validacija:
      $pagesIds = Page::pluck('id')->all();
      $pagesIds[] = 0;
      $pagesIds = implode(',', $pagesIds);
      $data = request()->validate([
          'page_id' => 'required|integer|in:' . $pagesIds,
          'title' => 'required|string|min:3|max:191|unique:pages',
          'description' => 'required|string|min:3|max:191',
          'image' => 'required|image|mimes:jpeg,png,jpg,bmp|max:2048',
          'content' => 'required|string|min:3|max:65000',
          'layout' => 'required|string|in:fullwidth,leftaside,rightaside',
          'contact_form' => 'required|in:0,1',
          'header' => 'required|boolean',
          'aside' => 'required|boolean',
          'footer' => 'required|boolean',
          'active' => 'required|boolean',
      ]);

      $row = new Page();

      unset($data['image']);
      foreach ($data as $key => $value) {
         $row->$key = $value;
      }
      $row->image = '';
      // provera da li uopste dolazi 'image' kroz request
      if (request()->has('image')) {
         $file = request()->image;
         $fileExtension = $file->getClientOriginalExtension();

         $fileName = $file->getClientOriginalName();
         $fileName = pathinfo($fileName, PATHINFO_FILENAME);
         $fileName = config('app.seo-image-prefiks') . Str::slug(request('title'), '-') . '-' . Str::slug(now(), '-') . '.' . $fileExtension;

//         echo "<br>" . public_path('/upload/pages/');
         $file->move(public_path('/upload/pages/'), $fileName);

         $row->image = '/upload/pages/' . $fileName;

         // Intervention paket
         // xl velicicina
         $interventionImage = Image::make(public_path('/upload/pages/') . $fileName);
         $interventionImage->resize(1140, null, function ($constraint) {
            $constraint->aspectRatio();
         });
         $fileNameXL = '/upload/pages/' . config('app.seo-image-prefiks') . Str::slug(request('title'), '-') . '-' . Str::slug(now(), '-') . '-XL.' . $fileExtension;
         $interventionImage->save(public_path($fileNameXL));

         // m velicicina
         $interventionImage = Image::make(public_path('/upload/pages/') . $fileName);
         $interventionImage->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
         });
         $fileNameM = '/upload/pages/' . config('app.seo-image-prefiks') . Str::slug(request('title'), '-') . '-' . Str::slug(now(), '-') . '-m.' . $fileExtension;
         $interventionImage->save(public_path($fileNameM));

         // s velicicina
         $interventionImage = Image::make(public_path('/upload/pages/') . $fileName);
         $interventionImage->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
         });
         $fileNameS = '/upload/pages/' . config('app.seo-image-prefiks') . Str::slug(request('title'), '-') . '-' . Str::slug(now(), '-') . '-s.' . $fileExtension;
         $interventionImage->save(public_path($fileNameS));
      }

      $row->save();

      session()->flash('message-type', 'success');
      session()->flash('message-text', 'Successfully created page' . $row->title . '!');

      return redirect()->route('pages.index');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id) {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit(Page $page) {
      // Fali checkPrivilegies!!!
      $pagesTopLevel = $this->pagesTopLevel();

      return view('admin.pages.edit', compact(['page', 'pagesTopLevel']));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Page $page) {
      // Fali checkPrivilegies!!!
      // Validacija:
      // // Mislim da moze i ovako:
//      $pagesIds = Page::whereNotIn('id', [$page->id])->pluck('id')->all();

      $pagesIds = Page::where('id', '<>', [$page->id])->pluck('id')->all();
//      return $pagesIds;
//      die();
      $pagesIds[] = 0;
      $pagesIds = implode(',', $pagesIds);
      $data = request()->validate([
          'page_id' => 'required|integer|in:' . $pagesIds,
          'title' => 'required|string|min:3|max:191|unique:pages,title,' . $page->id,
          'description' => 'required|string|min:3|max:191',
          'image' => 'nullable|mimes:jpeg,png,jpg,bmp|max:2048',
          'content' => 'required|string|min:3|max:65000',
          'layout' => 'required|string|in:fullwidth,leftaside,rightaside',
          'contact_form' => 'required|in:0,1',
          'header' => 'required|boolean',
          'aside' => 'required|boolean',
          'footer' => 'required|boolean',
          'active' => 'required|boolean',
      ]);
      // Ovo valjda ne treba
      $row = $page;

//      unset($data['image']);
      foreach ($data as $key => $value) {
         $row->$key = $value;
      }
      $row->image = $page->image;
      // provera da li uopste dolazi 'image' kroz request
      if (request()->has('image')) {
         $file = request()->image;
         $fileExtension = $file->getClientOriginalExtension();

         $fileName = $file->getClientOriginalName();
         $fileName = pathinfo($fileName, PATHINFO_FILENAME);
         $fileName = config('app.seo-image-prefiks') . Str::slug(request('title'), '-') . '-' . Str::slug(now(), '-') . '.' . $fileExtension;

//         echo "<br>" . public_path('/upload/pages/');
         $file->move(public_path('/upload/pages/'), $fileName);

         $row->image = '/upload/pages/' . $fileName;

         // Intervention paket
         // xl velicicina
         $interventionImage = Image::make(public_path('/upload/pages/') . $fileName);
         $interventionImage->resize(1140, null, function ($constraint) {
            $constraint->aspectRatio();
         });
         $fileNameXL = '/upload/pages/' . config('app.seo-image-prefiks') . Str::slug(request('title'), '-') . '-' . Str::slug(now(), '-') . '-XL.' . $fileExtension;
         $interventionImage->save(public_path($fileNameXL));

         // m velicicina
         $interventionImage = Image::make(public_path('/upload/pages/') . $fileName);
         $interventionImage->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
         });
         $fileNameM = '/upload/pages/' . config('app.seo-image-prefiks') . Str::slug(request('title'), '-') . '-' . Str::slug(now(), '-') . '-m.' . $fileExtension;
         $interventionImage->save(public_path($fileNameM));

         // s velicicina
         $interventionImage = Image::make(public_path('/upload/pages/') . $fileName);
         $interventionImage->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
         });
         $fileNameS = '/upload/pages/' . config('app.seo-image-prefiks') . Str::slug(request('title'), '-') . '-' . Str::slug(now(), '-') . '-s.' . $fileExtension;
         $interventionImage->save(public_path($fileNameS));
      }

      $row->save();

      session()->flash('message-type', 'success');
      session()->flash('message-text', 'Successfully edited page' . $row->title . '!');

      return redirect()->route('pages.index');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id) {
      //
   }

   public function changestatus(Page $page) {
      if ($page->active == 1) {
         $page->active = 0;
      } else {
         $page->active = 1;
      }

      $page->save();

      session()->flash('message-type', 'success');
      session()->flash('message-text', 'Successfully changed status for the page :' . $page->title . '!');

      //return redirect()->route('pages.index');
      return back();
   }

   protected function pagesTopLevel() {
      return $pagesTopLevel = Page::toplevel()
              ->notdeleted()
              ->get();
   }

}

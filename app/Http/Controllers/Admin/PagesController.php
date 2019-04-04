<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Page;

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
   public function index() {
      //
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create() {
      return view('admin.pages.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request) {
      // Validacija:
      request()->validate([
          'title' => 'required|string|min:3|max:191',
          'description' => 'required|string|min:3|max:191',
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'content' => 'required|string|min:3|max:65000',
          'layout' => 'required|string|in:fullwidth,leftaside,rightaside',
          'contact_form' => 'required|in:0,1',
          'header' => 'required|in:0,1',
          'aside' => 'required|in:0,1',
          'footer' => 'required|in:0,1',
          'active' => 'required|in:0,1',
      ]);
      
      $newPage = new Page();
      $newPage->title = request('title');
      $newPage->description = request('description');
      
      $newPage->content = request('content');
      $newPage->layout = request('layout');
      $newPage->contact_form = request('contact_form');
      $newPage->header = request('header');
      $newPage->aside = request('aside');
      $newPage->footer = request('footer');
      $newPage->active = request('active');

      if ($request->hasFile('image')) {
         
         $storage_folder = '/images';
         
         $image = $request->file('image');
         $name = time() . '.' . $image->getClientOriginalExtension();
         $destinationPath = public_path($storage_folder);
         $image->move($destinationPath, $name);
         
         $newPage->image = $storage_folder . '/' . $name;
         
         $newPage->save();
         
         session()->flash('message-type', 'success');
         session()->flash('message-text', 'Successfully created a new page!!!');
         
//         return redirect( route('pages.create') );
         return back();
      }

      session()->flash('message-type', 'danger');
      session()->flash('message-text', 'An error occurred!');

      return back();
      //return redirect()->route('pages.index');
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
   public function edit($id) {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id) {
      //
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

}

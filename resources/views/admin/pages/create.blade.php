@extends('admin.layout.main')

@section('seo-title')
<title>{{ __('Create page') }} {{ config('app.seo-separator') }} {{ config('app.name') }}</title>
@endsection

@section('custom-css')

@endsection

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Create new page') }}</h1>
@include('admin.layout.partials.messages')
<div class='row'>
    <div class="offset-lg-2 col-lg-8">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('New page details') }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('pages.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <!--PAGE LEVEL-->
                    <div class="form-group">
                        <div class="row">
                            <label class="col-form-label col-sm-2 pt-2">Parent page *</label>
                            <div class="col-sm-3">
                                <select name="page_id" class="form-control">
                                    <option value='0'>Top level page</option>
                                    @if (count($pagesTopLevel) > 0)
                                       @foreach($pagesTopLevel as $value) 
                                          <option value='{{ $value->id }}' {{ (old('page_id') == $value->id) ? 'selected' : '' }}>{{ $value->title }}</option>
                                       @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        @if($errors->has('page_id'))
                        <div class='text text-danger'>
                            {{ $errors->first('page_id') }}
                        </div>
                        @endif
                    </div>
                    
                    <!--TITLE-->
                    <div class="form-group">
                        <label>Title *</label>
                        <input type="text" name='title' value='{{ old("title") }}' class="form-control">
                        @if($errors->has('title'))
                        <div class='text text-danger'>
                            {{ $errors->first('title') }}
                        </div>
                        @endif
                    </div>
                    <!--DESCRIPTION-->
                    <div class="form-group">
                        <label>Description *</label>
                        <textarea name="description" class="form-control">{!! old("description") !!}</textarea>
                        @if($errors->has('description'))
                        <div class='text text-danger'>
                            {{ $errors->first('description') }}
                        </div>
                        @endif
                    </div>

                    <!--MOJ IMAGE-->
                    <div class="custom-file">
                        <input type="file" name='image' class="custom-file-input" id="image-upload">
                        <label class="custom-file-label" for="image-upload">Image *</label>
                        @if($errors->has('image'))
                        <div class='text text-danger'>
                            {{ $errors->first('image') }}
                        </div>
                        @endif
                    </div>
                    <br>
                    <br>
                    <!--CONTENT-->
                    <div class="form-group">
                        <label>Content *</label>
                        <textarea id="content-create" name="content" class="form-control">{!! old("content") !!}</textarea>
                        @if($errors->has('content'))
                        <div class='text text-danger'>
                            {{ $errors->first('content') }}
                        </div>
                        @endif
                    </div>

                    <!--LAYOUT-->
                    <div class="form-group">
                        <div class="row">
                            <label class="col-form-label col-sm-2 pt-2">Layout</label>
                            <div class="col-sm-3">
                                <select name="layout" class="form-control">
                                    <option value=''>-- Choose page layout --</option>
                                    <option value='fullwidth' {{ (old('layout') == 'fullwidth') ? 'selected' : '' }}>Width 100%</option>
                                    <option value='leftaside' {{ (old('layout') == 'leftaside') ? 'selected' : '' }}>With left aside</option>
                                    <option value='rightaside' {{ (old('layout') == 'rightaside') ? 'selected' : '' }}>With right aside</option>
                                </select>
                            </div>
                        </div>
                        @if($errors->has('layout'))
                        <div class='text text-danger'>
                            {{ $errors->first('layout') }}
                        </div>
                        @endif
                    </div>
                    <!--CONTACT FORM -->
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Contact form?</legend>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="contact_form" id="gridRadios1" value="1" {{ (old('contact_form', 0)) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gridRadios1">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="contact_form" id="gridRadios2" value="0" {{ (old('contact_form', 0)) == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gridRadios2">
                                        No
                                    </label>
                                </div>
                            </div>
                            @if($errors->has('contact_form'))
                            <div class='text text-danger'>
                                {{ $errors->first('contact_form') }}
                            </div>
                            @endif
                        </div>
                    </fieldset>

                    <!--HEADER MENU-->
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Header menu?</legend>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="header" id="gridRadios1-header" value="1" {{ (old('header', 1)) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gridRadios1-header">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="header" id="gridRadios2-header" value="0" {{ (old('header', 1)) == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gridRadios2-header">
                                        No
                                    </label>
                                </div>
                            </div>
                            @if($errors->has('header'))
                            <div class='text text-danger'>
                                {{ $errors->first('header') }}
                            </div>
                            @endif
                        </div>
                    </fieldset>



                    <!--ASIDE-->
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Aside menu?</legend>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="aside" id="gridRadios1aside" value="1" {{ (old('aside', 1)) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gridRadios1aside">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="aside" id="gridRadios2aside" value="0" {{ (old('aside', 1)) == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gridRadios2aside">
                                        No
                                    </label>
                                </div>
                            </div>
                            @if($errors->has('aside'))
                            <div class='text text-danger'>
                                {{ $errors->first('aside') }}
                            </div>
                            @endif
                        </div>
                    </fieldset>

                    <!--FOOTER -->
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Footer menu?</legend>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="footer" id="gridRadios1footer" value="1" {{ (old('footer', 0)) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gridRadios1footer">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="footer" id="gridRadios2footer" value="0" {{ (old('footer', 0)) == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gridRadios2footer">
                                        No
                                    </label>
                                </div>
                            </div>
                            @if($errors->has('footer'))
                            <div class='text text-danger'>
                                {{ $errors->first('footer') }}
                            </div>
                            @endif
                        </div>
                    </fieldset>

                    <!--CONTACT FORM -->
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Page is active?</legend>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="active" id="gridRadios1active" value="1" {{ (old('active', 0)) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gridRadios1active">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="active" id="gridRadios2active" value="0" {{ (old('active', 0)) == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gridRadios2active">
                                        No
                                    </label>
                                </div>
                            </div>
                            @if($errors->has('active'))
                            <div class='text text-danger'>
                                {{ $errors->first('active') }}
                            </div>
                            @endif
                        </div>
                    </fieldset>


                    <div class="form-group text-right">
                        <button type='submit' class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@section('custom-js')
<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>

<script>
   ClassicEditor
           .create(document.querySelector('#content-create'))
           .catch(error => {
               console.error(error);
           });
</script>
@endsection


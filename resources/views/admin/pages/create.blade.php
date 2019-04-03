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
                        <textarea name="description" class="form-control">{{ old("description") }}</textarea>
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
                        <textarea id="content-create" name="content" class="form-control">{{ old("content") }}</textarea>
                        @if($errors->has('content'))
                        <div class='text text-danger'>
                            {{ $errors->first('content') }}
                        </div>
                        @endif
                    </div>
                    
                    <!--LAYOUT-->
                    <div class="form-group">
                        <label>Layout</label>
                        <select name="layout" class="form-control">
                            <option value=''>-- Choose page layout --</option>
                            <option value='fullwidth' {{ (old('layout') == 'fullwidth') ? 'selected' : '' }}>Width 100%</option>
                            <option value='leftaside' {{ (old('layout') == 'leftaside') ? 'selected' : '' }}>With left aside</option>
                            <option value='rightaside' {{ (old('layout') == 'rightaside') ? 'selected' : '' }}>With right aside</option>
                        </select>
                        @if($errors->has('layout'))
                        <div class='text text-danger'>
                            {{ $errors->first('layout') }}
                        </div>
                        @endif
                    </div>

                    <!--MOJ CONTACT FORM (inline pokusaj 1) -->
                    <div class="form-group">
                        <label>Contact form</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="contact_form" id="contact-form-radio-1" value="0" {{ (old('layout', 0)) == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="contact-form-radio-1">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="contact_form" id="contact-form-radio-2" value="1" {{ (old('layout')) == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="contact-form-radio-2">Yes</label>
                        </div>
                        @if($errors->has('contact_form'))
                        <div class='text text-danger'>
                            {{ $errors->first('contact_form') }}
                        </div>
                        @endif
                    </div>
                    
                    <!--HEADER -->
                    <div class="form-group">
                        <label class="mr-5">Header</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="header" id="header-radio-1" value="0" {{ (old('header')) == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="header-radio-1">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="header" id="header-radio-2" value="1" {{ (old('header', 1)) == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="header-radio-2">Yes</label>
                        </div>
                        @if($errors->has('header'))
                        <div class='text text-danger'>
                            {{ $errors->first('header') }}
                        </div>
                        @endif
                    </div>
                    
                    <!--ASIDE -->
                    <div class="form-group">
                        <label class="mr-5">Aside</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="aside" id="aside-radio-1" value="0" {{ (old('aside')) == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="aside-radio-1">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="aside" id="aside-radio-2" value="1" {{ (old('aside', 1)) == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="aside-radio-2">Yes</label>
                        </div>
                        @if($errors->has('aside'))
                        <div class='text text-danger'>
                            {{ $errors->first('aside') }}
                        </div>
                        @endif
                    </div>
                    
                    <!--FOOTER -->
                    <div class="form-group">
                        <label class="mr-5">Footer</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="footer" id="footer-radio-1" value="0" {{ (old('footer', 0)) == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="footer-radio-1">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="footer" id="footer-radio-2" value="1" {{ (old('footer')) == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="footer-radio-2">Yes</label>
                        </div>
                        @if($errors->has('footer'))
                        <div class='text text-danger'>
                            {{ $errors->first('footer') }}
                        </div>
                        @endif
                    </div>
                    
                    <!--ACTIVE -->
                    <div class="form-group">
                        <label class="mr-5">Active</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="active" id="active-radio-1" value="0" {{ (old('active', 0)) == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="active-radio-1">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="active" id="active-radio-2" value="1" {{ (old('active')) == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="active-radio-2">Yes</label>
                        </div>
                        @if($errors->has('active'))
                        <div class='text text-danger'>
                            {{ $errors->first('active') }}
                        </div>
                        @endif
                    </div>

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


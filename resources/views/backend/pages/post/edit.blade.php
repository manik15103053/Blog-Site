@extends('backend.layouts.master')

@section('title')
    {{ __('Create Post') }}
@endsection
@section('styles')
<link href="{{ asset('admin/backend/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/backend/css/summernote.min.css') }}" rel="stylesheet" />
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body ">
                    <h4 class="header-title">{{ __('Create Post') }}</h4>
                    <form action="{{ route('user.post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}" placeholder="{{ __('Input The Title') }}">
                            @if ($errors->has('title'))
                                <div class="text-danger">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="slug">{{ __('Slug') }}</label>
                            <input type="text" name="slug" class="form-control" id="slug" value="{{ $post->slug }}" placeholder="{{ __('Input The Slug') }}">
                            @if ($errors->has('slug'))
                                <div class="text-danger">
                                    {{ $errors->first('slug') }}
                                </div>
                            @endif
                        </div>
                        <div class="row">
                         <div class="form-group col-md-6">
                            <label for="slug">{{ __('Tag') }}</label>
                            <select id="tags" name="tags[]" class="form-control select2" multiple="multiple">
                                <option value="">{{ __('Select Tag') }}</option>
                                @foreach($tags as $tag)
                                    <option
                                        @foreach ($post->tags as $postTag)
                                        {{$postTag->id == $tag->id ? 'selected' : ''}}
                                        @endforeach
                                    value="{{ $tag->id }}" >{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="slug">{{ __('Category') }}</label>
                            <select name="categories[]" id="categories" class="form-control select2" multiple="multiple">
                                <option value="">{{ __('Select Category') }}</option>
                                @foreach ($categories as $category)
                                    <option
                                    @foreach ($post->categories as $postCategory)
                                        {{ $postCategory->id == $category->id ? 'selected' : '' }}
                                    @endforeach
                                    value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('slug'))
                                <div class="text-danger">
                                    {{ $errors->first('slug') }}
                                </div>
                            @endif
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="image">{{ __('Image') }}</label>
                            <input type="file" name="image" class="form-control"  id="image" placeholder="{{ __('Choose File') }}">
                            <img src="{{ asset('images/post/'.$post->image) }}" width="70px" height="70px" alt="image">
                            @if ($errors->has('image'))
                                <div class="text-danger">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="checkbox"id="publish"class="filled-in"name="status"value="1" {{ $post->status == true ? 'checked' : ''}}>
                            <label for="publish">Publish</label>
                        </div>
                        <div class="form-group">
                            <label for="body">{{ __('Body') }}</label>
                            <textarea id="summernote" name="body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success float-right">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('admin/backend/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/backend/js/summernote.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    $(document).ready(function() {
      $('#summernote').summernote();
    });
    </script>
@endsection

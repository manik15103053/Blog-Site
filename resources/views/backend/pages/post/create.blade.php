@extends('backend.layouts.master')

@section('css')
@endsection

@section('title')
    {{ __('Tag Edit') }}
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body ">
                    <h4 class="header-title">{{ __('Edit Tag') }}</h4>
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="{{ __('Input The Title') }}">
                            @if ($errors->has('title'))
                                <div class="text-danger">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="slug">{{ __('Slug') }}</label>
                            <input type="text" name="slug" class="form-control" id="slug" placeholder="{{ __('Input The Slug') }}">
                            @if ($errors->has('slug'))
                                <div class="text-danger">
                                    {{ $errors->first('slug') }}
                                </div>
                            @endif
                        </div>
                        <div class="row">
                         <div class="form-group col-md-6">
                            <label for="slug">{{ __('Tag') }}</label>
                            <select name="category_id" id="category_id" class="form-control" >
                                @foreach ($tags as $tag)
                                    <option value="$tag->id">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('slug'))
                                <div class="text-danger">
                                    {{ $errors->first('slug') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="slug">{{ __('Category') }}</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="$category->id">{{ $category->title }}</option>
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
                            <label for="slug">{{ __('Slug') }}</label>
                            <input type="file" name="slug" class="form-control" id="slug" placeholder="{{ __('Input The Slug') }}">
                            @if ($errors->has('slug'))
                                <div class="text-danger">
                                    {{ $errors->first('slug') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="checkbox"id="publish"class="filled-in"name="status"value="1">
                            <label for="publish">Publish</label>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('Body') }}</label>
                            <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
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
@endsection

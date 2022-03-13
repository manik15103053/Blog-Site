@extends('backend.layouts.master')

@section('title')
    {{ __('Category Edit') }}
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body ">
                    <h4 class="header-title">{{ __('Edit Tag') }}</h4>
                    <form action="{{ route('user.category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" name="title" value="{{ $category->title }}" class="form-control" id="title" placeholder="{{ __('Input The Title') }}">
                            @if ($errors->has('title'))
                                <div class="text-danger">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="slug">{{ __('Slug') }}</label>
                            <input type="text" name="slug" value="{{ $category->slug }}" class="form-control" id="slug" placeholder="{{ __('Input The Slug') }}">
                            @if ($errors->has('slug'))
                                <div class="text-danger">
                                    {{ $errors->first('slug') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="image">{{ __('Image') }}</label>
                            <input type="file" name="image" class="form-control" id="image" placeholder="{{ __('Input The Slug') }}">
                            <img src="{{ asset('images/category/'.$category->image) }}" width="70px" height="70px" alt="image">
                            @if ($errors->has('image'))
                                <div class="text-danger">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control" placeholder="Enter The Description">{{ $category->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success float-right">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

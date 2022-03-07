@extends('backend.layouts.master')

@section('title')
{{ __('Tags') }}
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <!-- table primary start -->
        <div class="col-lg-7 mt-5">
            <div class="card">
                <div class="card-body">
                    @include('backend.layouts.partial.success-message')
                    <h4 class="header-title">All Tags</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="text-uppercase bg-success">
                                    <tr class="text-white">
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('Title') }}</th>
                                        <th scope="col">{{ __('Description') }}</th>
                                        <th scope="col">{{ __('action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $key=>$tag)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $tag->title }}</td>
                                            <td>{{ $tag->description }}</td>
                                            <td>
                                                <a href="{{ route('tag.edit',$tag->id) }}" class="btn btn-success btn-sm">
                                                    <i class="fa fa-edit "></i>
                                                </a>
                                                <a href="{{ route('tag.delete',$tag->id) }}" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash "></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $tags->links() }}
            </div>
        </div>
        <!-- table primary end -->
        <!-- table success start -->
        <div class="col-lg-5 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{ __('Add Tag') }}</h4>
                    <form action="{{ route('tag.store') }}" method="POST">
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
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control" placeholder="Enter The Description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success float-right">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

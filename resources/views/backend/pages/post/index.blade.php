@extends('backend.layouts.master')

@section('title')
{{ __('Post') }}
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <!-- table primary start -->
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    @include('backend.layouts.partial.success-message')
                    <h4 class="header-title">{{ __('All Post') }}
                        <a href="{{ route('user.post.create') }}" class="btn btn-success btn-sm float-right">
                            <span>{{ __('Create Post') }}</span>
                            <i class="fa fa-plus "></i>

                        </a>
                    </h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="text-uppercase bg-success">
                                    <tr class="text-white">
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('Title') }}</th>
                                        <th scope="col">{{ __('Created By') }}</th>
                                        <th scope="col">{{ __('View Count') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Is Approved') }}</th>
                                        <th scope="col">{{ __('Created At') }}</th>
                                        <th scope="col">{{ __('action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $key=>$post)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ Str::limit($post->title ,15) }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->view_count }}</td>
                                            <td>
                                                @if ($post->status == true)
                                                    <span class="btn btn-success btn-sm">{{ __('Publish') }}</span>
                                                @else
                                                    <span class="btn btn-warning btn-sm">{{ __('Pending') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($post->is_approved == true)
                                                    <span class="btn btn-primary btn-sm">{{ __('Approved') }}</span>
                                                @else
                                                    <span class="btn btn-danger btn-sm">{{ __('Pending') }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $post->created_at }}</td>
                                            <td>
                                                <a href="{{ route('frontend.home') }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('user.post.edit',$post->id) }}" class="btn btn-success btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('user.post.delete',$post->id) }}" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

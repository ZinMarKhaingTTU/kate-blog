@extends('layouts.backend')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="my-5">
            <h1 class="mt-4 d-inline">Posts</h1>
            <a href="{{ route('admin-posts.create') }}" class="btn btn-primary float-end">Add Post</a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Post Lists
            </div>
            <div class="card-body">
                <table id="" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>photo</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td><img src="{{ $post->photo }}" alt="" class="h-35 w-25"></td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</main>
@endsection

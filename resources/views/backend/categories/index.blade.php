@extends('layouts.backend')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="my-5">
            <h1 class="mt-4 d-inline">Categories</h1>
            <a href="{{ route('categories.create') }}" class="btn btn-primary float-end">Add Category</a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Category Lists
            </div>
            <div class="card-body">
                <table id="" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</main>
@endsection

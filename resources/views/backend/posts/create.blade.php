@extends('layouts.backend')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="my-5">
            <h1 class="mt-4 d-inline">Post Create</h1>
            <a href="{{ URL::previous() }}" class="btn btn-danger float-end">Cancel</a>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <form class="row g-3" action="{{ route('admin-posts.store')}}" method="POST" enctype="multipart/form-data">
                    {{  csrf_field() }}
                    <div class="col-md-6 position-relative">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" name="category_id" id="category_id" required>
                                <option selected disabled value="">Choose Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" required></textarea>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" name="photo" id="photo" accept="image/*" required>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary float-end" type="submit">Save</button>
                    </div>
                </form>
            </div>
    </div>
</main>
@endsection

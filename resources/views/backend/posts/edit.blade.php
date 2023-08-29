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
                <form class="row g-3" action="{{ route('admin.posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                    {{  csrf_field() }}
                    {{  method_field('PUT') }}
                    <div class="col-md-6 position-relative">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" id="title"  value="{{ $post->title }}">
                        @if ($errors->has('title'))
                            <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="category_id" class="form-label">Category</label>
                            <select class="form-select {{ $errors->has('category_id') ? 'is-invalid' : '' }}" name="category_id" id="category_id" >
                                <option disabled value="">Choose Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        @if ($errors->has('category_id'))
                            <div class="invalid-feedback">
                            {{ $errors->first('category_id') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" >{{ $post->description }}</textarea>
                        @if ($errors->has('description'))
                            <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="photo" class="form-label">Photo</label>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="true">Old Photo</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="new_image-tab" data-bs-toggle="tab" data-bs-target="#new_image-tab-pane" type="button" role="tab" aria-controls="new_image-tab-pane" aria-selected="false">New Photo</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0" class="py-5">
                                <img src="{{ $post->photo }}" alt="" class="py-5 w-25 h-25">
                                <input type="hidden" name="old_photo" value="{{ $post->photo }}" id="">
                            </div>
                            <div class="tab-pane fade" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab" tabindex="0">
                                <input type="file" class="form-control {{ $errors->has('photo') ? 'is-invalid' : ''}}" name="new_photo" id="photo" accept="image/*">
                            </div>
                        </div>
                        {{-- <input type="file" class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" name="photo" id="photo" accept="image/*" > --}}
                        @if ($errors->has('photo'))
                            <div class="invalid-feedback">
                            {{ $errors->first('photo') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary float-end" type="submit">Save</button>
                    </div>
                </form>
            </div>
    </div>
</main>
@endsection

@extends('layouts.backend')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="my-5">
            <h1 class="mt-4 d-inline">Category Create</h1>
            <a href="{{ URL::previous() }}" class="btn btn-danger float-end">Cancel</a>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <form class="row g-3" action="{{ route('categories.store')}}" method="POST" enctype="multipart/form-data">
                    {{  csrf_field() }}
                    <div class="col-md-6 position-relative">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" >
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
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

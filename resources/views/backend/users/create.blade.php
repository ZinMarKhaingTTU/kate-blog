@extends('layouts.backend')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="my-5">
            <h1 class="mt-4 d-inline">User Create</h1>
            <a href="{{route('admin.users.index') }}" class="btn btn-danger float-end">Cancel</a>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <form class="row g-3" action="{{ route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
                    {{  csrf_field() }}
                    <div class="col-md-6 position-relative">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control  {{ $errors->has('name')  ? 'is-invalid' : ''}}" name="name" id="name" >
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control {{ $errors->has('email')  ? 'is-invalid' : ''}}" name="email" id="email" >
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control {{ $errors->has('password')  ? 'is-invalid' : ''}}" name="password" id="password" >
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="password_confirmation" class="form-label">Comfirm Password</label>
                        <input type="password" class="form-control {{ $errors->has('password_confirmation')  ? 'is-invalid' : ''}}" name="password_confirmation" id="password_confirmation" >
                        @if ($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                            {{ $errors->first('password_confirmation') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select {{ $errors->has('role')  ? 'is-invalid' : ''}}" name="role" id="role" >
                            <option selected value="Super Admin">Super Admin</option>
                            <option  value="Admin">Admin</option>
                            <option  value="User">User</option>
                        </select>
                        @if ($errors->has('role'))
                        <div class="invalid-feedback">
                            {{ $errors->first('role') }}
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

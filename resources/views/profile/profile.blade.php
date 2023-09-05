@extends('layouts.front_end')

@section('content')
<div class="container rounded bg-white mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{ $user->name }}</span><span class="text-black-50">{{ $user->email }}</span><span class="text-black-50">{{ $user->phone }} </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form method="POST" action="{{ route('profile.update' ,$user->id) }}">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-12">

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label class="labels  mb-3">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Update Profile</button></div>
                    <input type="hidden" name="role" value="User">
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">

            </div>
        </div>
    </div>
    <div class="mt-5 py-5"></div>
</div>
@endsection

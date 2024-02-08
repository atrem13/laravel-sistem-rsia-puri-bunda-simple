@extends('layouts.auth')
@section('page-content-title')
    Reset Admin Password
@endsection
@section('page-content-body')
<form method="POST" action="{{ route('auth.reset_password.reset_admin') }}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="row mb-3">
        <div class="col-md">
            <div class="form-group">
            <label>Email</label>
                <input type="hidden" name="token" value="{{ request('token') }}">
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                @error('email')<small class="invalid-feedback">{{ $message }}</small>@enderror
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md">
            <div class="form-group">
            <label>Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
                @error('password')<small class="invalid-feedback">{{ $message }}</small>@enderror
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md">
            <div class="form-group">
            <label>Konfirmasi Password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')<small class="invalid-feedback">{{ $message }}</small>@enderror
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md">
            <button type="submit" class="btn w-100 btn-sm btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
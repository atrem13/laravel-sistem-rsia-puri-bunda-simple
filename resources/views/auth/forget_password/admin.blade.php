@extends('layouts.auth')
@section('page-content-title')
    Reset Admin Password
@endsection
@section('page-content-body')
<form method="POST" action="{{ route('auth.forget_password.forget_admin') }}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="row mb-3">
        <div class="col-md">
            <div class="form-group">
            <label>Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                @error('email')<small class="invalid-feedback">{{ $message }}</small>@enderror
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
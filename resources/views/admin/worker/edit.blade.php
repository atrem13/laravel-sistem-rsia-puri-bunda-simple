@extends('layouts.admin')

@section('page-title')
    Halaman Karyawan
@endsection

@section('page-parent-route')
    Karyawan
@endsection

@section('page-active-route')
    Edit
@endsection

@section('page-back-button')
    <a href="{{ route('admin.worker.index') }}" class="my-2 btn btn-secondary btn-sm"><i class="ri-arrow-left-circle-line"></i> Kembali</a>
@endsection

@section('page-content-title')
    Edit Data Karyawan
@endsection

@section('page-desc')
    Halaman untuk mengubah data karyawan
@endsection

@section('page-content-body')
<div class="row">
    <div class="col-md">
        <form method="POST" action="{{ route('admin.worker.update', $data->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md">
                    <div class="form-group">
                        <label>Jabatan Pertama</label>
                        <select name="first_occupation_id" class="select-picker form-control @error('first_occupation_id') is-invalid @enderror" style="width:100%;">
                            <option value="">--Pilih--</option>
                            @foreach ($occupation as $item)
                                <option value="{{ $item->id }}" {{ (old('first_occupation_id', $data->first_occupation_id) == $item->id) ? "selected" : "" }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('first_occupation_id')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md">
                    <div class="form-group">
                        <label>Jabatan Pertama</label>
                        <select name="second_occupation_id" class="select-picker form-control @error('second_occupation_id') is-invalid @enderror" style="width:100%;">
                            <option value="">--Pilih--</option>
                            @foreach ($occupation as $item)
                                <option value="{{ $item->id }}" {{ (old('second_occupation_id', $data->second_occupation_id) == $item->id) ? "selected" : "" }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('second_occupation_id')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md">
                    <div class="form-group">
                        <label>Unit</label>
                        <select name="units[]" class="select-picker form-control @error('units[]') is-invalid @enderror" style="width:100%;" multiple="multiple">
                            @foreach ($unit as $item)
                                <option value="{{ $item->id }}" 
                                    {{ in_array($item->id, old('units', $data->units->pluck('id')->toArray() ?? [])) ? "selected" : "" }}
                                >
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('units[]')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md">
                    <div class="form-group">
                    <label>Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $data->name) }}">
                        @error('name')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md">
                    <div class="form-group">
                    <label>Tanggal Bergabung</label>
                        <input type="date" class="form-control @error('join_date') is-invalid @enderror" name="join_date" value="{{ old('join_date', $data->join_date) }}">
                        @error('join_date')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md">
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="address" id="" cols="30" rows="10" class="form-control  @error('address') is-invalid @enderror">{{ old('address', $data->address) }}</textarea>
                        @error('address')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md">
                    <div class="form-group">
                    <label>Nomor Telepon</label>
                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number', $data->phone_number) }}">
                        @error('phone_number')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md">
                    <div class="form-group">
                    <label>Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $data->email) }}">
                        @error('email')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md">
                    <div class="form-group">
                    <label>Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $data->username) }}">
                        @error('username')<small class="invalid-feedback">{{ $message }}</small>@enderror
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
                    <div class="form-group">
                    <label>Foto</label>
                        <input type="file" class="form-control @error('myimg') is-invalid @enderror" name="myimg" value="{{ old('myimg') }}" id="myimg">
                        @error('myimg')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
                <div class="col-md-12 my-2">
                    <img id="preview-myimg" src="{{ ($data->img) ? url('/upload/admin/worker/', $data->img) : 'https://cdn.pixabay.com/photo/2015/12/22/04/00/photo-1103595_960_720.png' }}" alt="preview image" style="height: 300px;">
                </div>
            </div>
            <div class="text-end my-3">
                <button type="reset" class="btn btn-danger"><i class="fa fa-fw fa-undo me-1"></i>Reset</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-paper-plane me-1"></i>Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection


@section('page-js')
    <script>
        $(document).ready(function() {
            // for display myimg
            $('#myimg').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                $('#preview-myimg').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection


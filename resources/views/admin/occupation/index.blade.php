@extends('layouts.admin')

@section('page-title')
    Halaman Jabatan
@endsection

@section('page-parent-route')
    Jabatan
@endsection

@section('page-active-route')
    Index
@endsection

@section('page-action-button')
    <a href="javascript:;" onclick="show_hide_insert()" class="btn btn-sm btn-success"><i class="ri-add-circle-line"></i> Tambah Data</a>
@endsection

@section('page-content-title')
    Data Jabatan
@endsection

@section('page-content-desc')
    Halaman untuk mengatur data jabatan
@endsection

@section('page-content-body')

    <div class="row">
        <div class="col-12">
            <div id="insert-box">
                <div class="card mb-4 shadow-none">
                    <div class="card-header py-2 mb-3">
                        <div class="row">
                            <div class="col-md">
                                <h6 class="my-2 font-weight-bold text-dark">
                                    Tambah Data Jabatan
                                </h6>
                            </div>
                            <div class="col-md text-end my-auto">
                                <a href="javascript:;" onclick="show_hide_insert()" class="btn btn-sm btn-danger"><i class="ri-close-fill"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.occupation.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row mb-3">
                                <div class="col-md">
                                    <div class="form-group">
                                    <label>Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                        @error('name')<small class="invalid-feedback">{{ $message }}</small>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-end my-3">
                                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-undo me-1"></i>Reset</button>
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-fw fa-paper-unite me-1"></i>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
                    <thead>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('page-js')
    <script>
        @if ( ! $errors->any())
        $('#insert-box').hide();
        @endif
        function show_hide_insert() {
            $('#insert-box').toggle('fast', 'swing');
        }
        $('#datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.occupation.index') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            order: [[ 0, "name" ]]
        });

    </script>
@endsection

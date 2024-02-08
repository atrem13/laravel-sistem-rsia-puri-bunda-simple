@extends('layouts.admin')

@section('page-title')
    Halaman Dashboard
@endsection

@section('page-parent-route')
    Dashboard
@endsection

@section('page-active-route')
    Index
@endsection

@section('page-action-button')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-sm btn-secondary text-white" data-bs-toggle="modal" data-bs-target="#filterModal">
      <i class="ri-equalizer-line"></i> Filter
    </button>
    <!-- Modal -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog text-start">
            <form method="POST" action="{{ route('admin.dashboard.store') }}" enctype="multipart/form-data" id="form">
            @csrf
            @method('POST')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="filterModalLabel">Filter Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <label>Tanggal Mulai</label>
                        <input type="date" name="start_date" class="form-control" required value="{{ request()->get('start_date') }}">
                        <label>Tanggal Selesai</label>
                        <input type="date" name="end_date" class="form-control" required value="{{ request()->get('end_date') }}">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info text-white">Terapkan</button>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection

@section('page-content-title')
    Data Dashboard {{ format_date($startDate) }} sampai {{ format_date($endDate) }}
@endsection

@section('page-content-desc')
    Halaman untuk melihat detail data dashboard
@endsection

@section('page-content-body')

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
              <div class="col-4">
                <div class="card info-card worker-card">
                  <div class="card-body">
                    <h5 class="card-title">Karyawan</h5>
                      <div class="ps-3">
                        <h6>{{ $totalWorker }}</h6>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="card info-card worker-card">
                  <div class="card-body">
                    <h5 class="card-title">Unit</h5>
                      <div class="ps-3">
                        <h6>{{ $totalUnit }}</h6>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="card info-card worker-card">
                  <div class="card-body">
                    <h5 class="card-title">Jabatan</h5>
                      <div class="ps-3">
                        <h6>{{ $totalOccupation }}</h6>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <th>No</th>
                    <th>Nama Pegawai</th>
                    <th>Total Login</th>
                </thead>
                <tbody>
                    @if (count($topWorker))
                        @foreach ($topWorker as $index => $item)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->login_histories_count }}x</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="text-center">Tidak Ada Data Karyawan Login Lebih Dari 25x</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('page-js')
    <script>
    </script>
@endsection

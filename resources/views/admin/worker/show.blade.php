<div class="border-bottom pb-3">
    <h6 class="font-weight-bold">Foto</h6>
    <div class="row">
        <div class="col-12 text-center">
            <img src="{{ url('/upload/admin/worker', $data->img) }}" alt="" class="rounded" style="height:150px;width:150px;">
        </div>
    </div>
</div>
<div class="border-bottom py-3">
    <h6 class="font-weight-bold">Jabatan Pertama</h6>{{ $data->first_occupation->name }}
</div>
<div class="border-bottom py-3">
    <h6 class="font-weight-bold">Jabatan Kedua</h6>{{ ($data->second_occupation_id) ? $data->second_occupation->name : '-' }}
</div>
<div class="border-bottom py-3">
    <h6 class="font-weight-bold">Unit</h6>
    <ul>
        @foreach ($data->units as $item)
            <li>{{ $item->name }}</li>
        @endforeach
    </ul>
</div>
<div class="border-bottom py-3">
    <h6 class="font-weight-bold">Nama</h6>{{ $data->name }}
</div>
<div class="border-bottom py-3">
    <h6 class="font-weight-bold">Alamat</h6>{{ $data->address }}
</div>
<div class="border-bottom py-3">
    <h6 class="font-weight-bold">Nomor Telepon</h6>{{ $data->phone_number }}
</div>
<div class="border-bottom py-3">
    <h6 class="font-weight-bold">Email</h6>{{ $data->email }}
</div>
<div class="border-bottom py-3">
    <h6 class="font-weight-bold">Username</h6>{{ $data->username }}
</div>
<div class="border-bottom py-3">
    <h6 class="font-weight-bold">Tanggal Bergabung</h6>{{ format_date($data->join_date) }}
</div>
<div class="border-bottom py-3">
    <h6 class="font-weight-bold">Dibuat</h6>{{ format_datetime($data->created_at) }}
</div>
<div class="pt-3">
    <h6 class="font-weight-bold">Diperbaharui</h6>{{ format_datetime($data->updated_at) }}
</div>

<div class="border-bottom py-3">
    <h6 class="font-weight-bold">Nama</h6>{{ $data->name }}
</div>
<div class="border-bottom py-3">
    <h6 class="font-weight-bold">Dibuat</h6>{{ format_datetime($data->created_at) }}
</div>
<div class="pt-3">
    <h6 class="font-weight-bold">Diperbaharui</h6>{{ format_datetime($data->updated_at) }}
</div>

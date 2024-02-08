<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Form :attribute harus diterima.',
    'active_url'           => 'Form :attribute bukan URL yang sah.',
    'after'                => 'Form :attribute harus tanggal setelah :date.',
    'after_or_equal'       => 'Form :attribute harus tanggal setelah atau sama dengan :date.',
    'alpha'                => 'Form :attribute hanya boleh berisi huruf.',
    'alpha_dash'           => 'Form :attribute hanya boleh berisi huruf, angka, dan strip.',
    'alpha_num'            => 'Form :attribute hanya boleh berisi huruf dan angka.',
    'array'                => 'Form :attribute harus berupa sebuah array.',
    'before'               => 'Form :attribute harus tanggal sebelum :date.',
    'before_or_equal'      => 'Form :attribute harus tanggal sebelum atau sama dengan :date.',
    'between'              => [
        'numeric' => 'Form :attribute harus antara :min dan :max.',
        'file'    => 'Form :attribute harus antara :min dan :max kilobytes.',
        'string'  => 'Form :attribute harus antara :min dan :max karakter.',
        'array'   => 'Form :attribute harus antara :min dan :max item.',
    ],
    'boolean'              => 'Form :attribute harus berupa true atau false',
    'confirmed'            => 'Konfirmasi :attribute tidak cocok.',
    'date'                 => 'Form :attribute bukan tanggal yang valid.',
    'date_equals'          => 'Form :attribute harus tanggal yang sama dengan :date.',
    'date_format'          => 'Form :attribute tidak cocok dengan format :format.',
    'different'            => 'Form :attribute dan :other harus berbeda.',
    'digits'               => 'Form :attribute harus berupa angka :digits.',
    'digits_between'       => 'Form :attribute harus antara angka :min dan :max.',
    'dimensions'           => 'Form :attribute harus merupakan dimensi gambar yang sah.',
    'distinct'             => 'Form :attribute memiliki nilai yang duplikat.',
    'email'                => 'Form :attribute harus berupa alamat surel yang valid.',
    'ends_with'            => 'Form :attribute harus diakhiri dengan: :values.',
    'exists'               => 'Form :attribute yang dipilih tidak valid.',
    'file'                 => 'Form :attribute harus berupa file.',
    'filled'               => 'Form :attribute wajib diisi.',
    'gt' => [
        'numeric'   => 'Form :attribute harus lebih besar dari :value.',
        'file'      => 'Form :attribute harus lebih besar dari :value kilobytes.',
        'string'    => 'Form :attribute harus lebih besar dari :value karakter.',
        'array'     => 'Form :attribute harus memiliki lebih dari :value item.',
    ],
    'gte' => [
        'numeric'   => 'Form :attribute harus lebih besar dari atau sama dengan :value.',
        'file'      => 'Form :attribute harus lebih besar dari atau sama dengan :value kilobytes.',
        'string'    => 'Form :attribute harus lebih besar dari atau sama dengan :value karakter.',
        'array'     => 'Form :attribute harus memiliki :value item atau lebih.',
    ],
    'image'                => 'Form :attribute harus berupa gambar.',
    'in'                   => 'Form :attribute yang dipilih tidak valid.',
    'in_array'             => 'Form :attribute tidak terdapat dalam :other.',
    'integer'              => 'Form :attribute harus merupakan bilangan bulat.',
    'ip'                   => 'Form :attribute harus berupa alamat IP yang valid.',
    'ipv4'                 => 'Form :attribute harus berupa alamat IPv4 yang valid.',
    'ipv6'                 => 'Form :attribute harus berupa alamat IPv6 yang valid.',
    'json'                 => 'Form :attribute harus berupa JSON string yang valid.',
    'lt' => [
        'numeric'   => 'Form :attribute harus kurang dari :value.',
        'file'      => 'Form :attribute harus kurang dari :value kilobytes.',
        'string'    => 'Form :attribute harus kurang dari :value karakter.',
        'array'     => 'Form :attribute harus memiliki kurang dari :value item.',
    ],
    'lte' => [
        'numeric'   => 'Form :attribute harus kurang dari atau sama dengan :value.',
        'file'      => 'Form :attribute harus kurang dari atau sama dengan :value kilobytes.',
        'string'    => 'Form :attribute harus kurang dari atau sama dengan :value karakter.',
        'array'     => 'Form :attribute tidak boleh lebih dari :value item.',
    ],
    'max'                  => [
        'numeric' => 'Form :attribute seharusnya tidak lebih dari :max.',
        'file'    => 'Form :attribute seharusnya tidak lebih dari :max kilobytes.',
        'string'  => 'Form :attribute seharusnya tidak lebih dari :max karakter.',
        'array'   => 'Form :attribute seharusnya tidak lebih dari :max item.',
    ],
    'mimes'                => 'Form :attribute harus dokumen berjenis : :values.',
    'mimetypes'            => 'Form :attribute harus berupa file bertipe: :values.',
    'min'                  => [
        'numeric' => 'Form :attribute harus minimal :min.',
        'file'    => 'Form :attribute harus minimal :min kilobytes.',
        'string'  => 'Form :attribute harus minimal :min karakter.',
        'array'   => 'Form :attribute harus minimal :min item.',
    ],
    'not_in'               => 'Form :attribute yang dipilih tidak valid.',
    'not_regex'            => 'Form :attribute format tidak valid.',
    'numeric'              => 'Form :attribute harus berupa angka.',
    'password'             => 'Kata sandi tidak benar',
    'present'              => 'Form :attribute wajib ada.',
    'regex'                => 'Format form :attribute tidak valid.',
    'required'             => 'Form :attribute wajib diisi.',
    'required_if'          => 'Form :attribute wajib diisi bila :other adalah :value.',
    'required_unless'      => 'Form :attribute wajib diisi kecuali :other memiliki nilai :values.',
    'required_with'        => 'Form :attribute wajib diisi bila terdapat :values.',
    'required_with_all'    => 'Form :attribute wajib diisi bila terdapat :values.',
    'required_without'     => 'Form :attribute wajib diisi bila tidak terdapat :values.',
    'required_without_all' => 'Form :attribute wajib diisi bila tidak terdapat ada :values.',
    'same'                 => 'Form :attribute dan :other harus sama.',
    'size'                 => [
        'numeric' => 'Form :attribute harus berukuran :size.',
        'file'    => 'Form :attribute harus berukuran :size kilobyte.',
        'string'  => 'Form :attribute harus berukuran :size karakter.',
        'array'   => 'Form :attribute harus mengandung :size item.',
    ],
    'starts_with'          => 'Form :attribute harus dimulai dengan: :values.',
    'string'               => 'Form :attribute harus berupa string.',
    'timezone'             => 'Form :attribute harus berupa zona waktu yang valid.',
    'unique'               => 'Form :attribute sudah ada sebelumnya.',
    'uploaded'             => 'Form :attribute gagal mengunggah.',
    'url'                  => 'Format form :attribute tidak valid.',
    'uuid'                 => 'Form :attribute harus berupa UUID yang valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
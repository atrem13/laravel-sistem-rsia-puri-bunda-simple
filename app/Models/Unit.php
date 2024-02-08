<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use \App\Http\Traits\UsesUuid;
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = ['created_at', 'updated_at'];
    
    public function workers()
    {
        return $this->belongsToMany(Worker::class,'worker_units', 'unit_id', 'worker_id')->orderBy("name");
    }
}

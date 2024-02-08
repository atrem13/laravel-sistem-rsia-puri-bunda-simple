<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Worker extends Authenticatable
{
    use \App\Http\Traits\UsesUuid;
    use HasFactory, Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = ['created_at', 'updated_at'];

    // mutator for password field
    public function setPasswordAttribute($pass){
        $this->attributes['password'] = Hash::make($pass);
    }
    
    public function getAuthPassword() {
        return $this->password;
    }
    
    public function units()
    {
        return $this->belongsToMany(Unit::class,'worker_units', 'worker_id', 'unit_id')->orderBy("name");
    }

    public function login_histories()
    {
        return $this->hasMany(WorkerLoginHistory::class);
    }

    public function first_occupation()
    {
        return $this->belongsTo(Occupation::class, 'first_occupation_id', 'id');
    }

    public function second_occupation()
    {
        return $this->belongsTo(Occupation::class, 'second_occupation_id', 'id');
    }
}

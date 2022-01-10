<?php

namespace App\Models;

use App\Traits\LockableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Province extends Model
{
    use HasFactory, SoftDeletes, HasRoles, LockableTrait;

    public function district(){

        return $this->hasMany(District::class);

    }

    public function customer(){

        return $this->hasMany(Customer::class);

    }
}

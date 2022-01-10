<?php

namespace App\Models;

use App\Traits\LockableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Commune extends Model
{
    use HasFactory, SoftDeletes, HasRoles, LockableTrait;

    public function village(){

        return $this->hasMany(Village::class);

    }

    public function service(){

        return $this->hasMany(Service::class);

    }

    public function customer(){

        return $this->hasMany(Customer::class);

    }
}

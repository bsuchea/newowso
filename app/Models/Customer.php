<?php

namespace App\Models;

use App\Traits\LockableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Customer extends Model
{
    use HasFactory, SoftDeletes, HasRoles, LockableTrait;

    public function village(){

        return $this->belongsTo(Village::class);

    }

    public function commune(){

        return $this->belongsTo(Commune::class);

    }

    public function district(){

        return $this->belongsTo(District::class);

    }

    public function province(){

        return $this->belongsTo(Province::class);

    }

    public function service(){

        return $this->belongsTo(Service::class);

    }
}

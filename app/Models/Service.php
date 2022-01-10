<?php

namespace App\Models;

use App\Traits\LockableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Service extends Model
{
    use HasFactory, SoftDeletes, HasRoles, LockableTrait;

    protected $fillable = [
        'service_id',
        'sector_id',
        'brand_namekh',
        'brand_nameken',
        'business_type',
        'home',
        'group',
        'street',
        'locate'
    ];

     public function sector(){

        return $this->belongsTo(Sector::class);

    }

    public function service_type(){

        return $this->belongsTo(ServiceType::class);

    }

    public function village(){

        return $this->belongsTo(Village::class);

    }

    public function commune(){

        return $this->belongsTo(Commune::class);

    }

    public function customer(){

        return $this->belongsTo(Customer::class);

    }

}

<?php

namespace App\Models;

use App\Traits\LockableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class ServiceType extends Model
{
    use HasFactory, SoftDeletes, HasRoles, LockableTrait;

    protected $fillable = [

        'namekh', 'nameen','price', 'description'

    ];

    public function sector(){

        return $this->belongsTo(Sector::class);

    }

    public function service(){

        return $this->hasMany(Service::class);

    }
}

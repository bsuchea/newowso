<?php

namespace App\Models;

use App\Traits\LockableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Sector extends Model
{
    use HasFactory, SoftDeletes, HasRoles, LockableTrait;

    protected $fillable = [
        'namekh', 'nameen', 'description'
    ];

    public function serviceType(){

        return $this->hasMany(ServiceType::class);

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShootingType extends Model
{
    use HasFactory;

    public function works()
    {
        return $this->hasMany(Work::class, 'type_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'type_id');
    }
}

<?php

namespace App\Models;

use App\Models\WorkObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    public function objects()
    {
        return $this->hasMany(WorkObject::class);
    }

    public function type()
    {
        return $this->belongsTo(ShootingType::class);
    }
}

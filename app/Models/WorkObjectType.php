<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkObjectType extends Model
{
    use HasFactory;

    public function objects()
    {
        return $this->hasMany(WorkObject::class, 'type_id');
    }
}

<?php

namespace App\Models;

use App\Models\Work;
use App\Models\WorkObjectType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkObject extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'type_id',
    ];

    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    public function type()
    {
        return $this->belongsTo(WorkObjectType::class);
    }
}

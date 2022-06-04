<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price_per_hour',
        'description',
        'type_id',
        'image_path',
    ];

    public function save(array $options = [])
    {
        parent::save($options);

        if (!$this->image_path) {
            $this->image_path = "https://picsum.photos/seed/{$this->id}/450";
            $this->save();
        }
    }

    public function type()
    {
        return $this->belongsTo(ShootingType::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

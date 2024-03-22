<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'shop_name', 'area', 'genre', 'overview', 'picture_url'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'reservation')->withPivot('reservation_date','reservation_time', 'reservation_number');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }
}

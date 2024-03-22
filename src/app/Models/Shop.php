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
        return $this->belongsToMany(User::class, 'reservations')->withPivot('reservation_date', 'reservation_time', 'reservation_number');
    }

    public function Reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}

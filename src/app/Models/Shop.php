<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'shop_name', 'area_id', 'genre_id', 'overview', 'file_name', 'file_path', 'picture_url'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'reservations')->withPivot('reservation_date', 'reservation_time', 'reservation_number');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}

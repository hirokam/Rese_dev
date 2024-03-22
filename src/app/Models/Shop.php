<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'shop_name', 'area', 'genre', 'overview', 'picture_url'];

    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }

}

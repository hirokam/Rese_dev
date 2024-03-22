<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteShop extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'shop_id','is_active'];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

}

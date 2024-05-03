<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewShop extends Model
{
    use HasFactory;

    protected $fillable =['user_id', 'shop_id', 'stars', 'comment', 'picture_name', 'path'];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public $sortable =['stars'];
}

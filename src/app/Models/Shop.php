<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Shop extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = ['user_id', 'shop_name', 'area_id', 'genre_id', 'overview', 'file_name', 'file_path', 'picture_url'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'reservations')->withPivot('reservation_date', 'reservation_time', 'reservation_number');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function reviews()
    {
        return $this->hasMany(ReviewShop::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public static function getAreaIdByName($areaName) {
        $area = Area::where('area', $areaName)->first();
        return $area ? $area->id : null;
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public static function getGenreIdByName($genreName) {
        $genre = Genre::where('genre', $genreName)->first();
        return $genre ? $genre->id : null;
    }
}

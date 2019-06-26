<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;
use App\Comment;

class News extends Model
{
    //
    protected $table = "tintuc";
    protected $fillable = [
        'TieuDe', 'TieuDeKhongDau', 'TomTat', 'NoiDung', 'Hinh', 'NoiBat', 'SoLuotXem', 'idLoaiTin', 'PheDuyet',
    ];

    public function loaitin()
    {
    	return $this->belongsTo('App\Type', 'idLoaiTin', 'id');
    }

    public function comment()
    {
    	return $this->hasMany('App\Comment', 'idTinTuc', 'id');
    }

    public function like()
    {
        return $this->hasMany('App\Like', 'idTinTuc', 'id');
    }
}

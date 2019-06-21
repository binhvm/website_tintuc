<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LoaiTin;
use App\Comment;

class TinTuc extends Model
{
    //
    protected $table = "tintuc";
    protected $fillable = [
        'TieuDe', 'TieuDeKhongDau', 'TomTat', 'NoiDung', 'Hinh', 'NoiBat', 'SoLuotXem', 'idLoaiTin', 'PheDuyet',
    ];

    public function loaitin()
    {
    	return $this->belongsTo('App\LoaiTin', 'idLoaiTin', 'id');
    }

    public function comment()
    {
    	return $this->hasMany('App\Comment', 'idTinTuc', 'id');
    }
}

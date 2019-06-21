<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TheLoai;
use App\TinTuc;

class LoaiTin extends Model
{
    //
    protected $table = "loaitin";
    protected $fillable = [
        'idTheLoai', 'Ten', 'TenKhongDau',
    ];

    public function theloai()
    {
    	return $this->belongsTo('App\TheLoai', 'idTheLoai', 'id');
    }

    public function tintuc()
    {
    	return $this->hasMany('App\TinTuc', 'idLoaiTin', 'id');
    }
}

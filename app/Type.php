<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\News;

class Type extends Model
{
    //
    protected $table = "loaitin";
    protected $fillable = [
        'idTheLoai', 'Ten', 'TenKhongDau',
    ];

    public function theloai()
    {
    	return $this->belongsTo('App\Category', 'idTheLoai', 'id');
    }

    public function tintuc()
    {
    	return $this->hasMany('App\News', 'idLoaiTin', 'id');
    }
}

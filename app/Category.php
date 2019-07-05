<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;
use App\News;

class Category extends Model
{
    //protected $guarded = ['id'];
    protected $table = "theloai";
    protected $fillable = [
        'Ten', 'TenKhongDau',
    ];

    public function loaitin()
    {
    	return $this->hasMany('App\Type', 'idTheLoai', 'id');
    }

    public function tintuc()
    {
    	return $this->hasManyThrough('App\News', 'App\Type', 'idTheLoai', 'idLoaiTin');
    }
}

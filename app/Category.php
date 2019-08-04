<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;
use App\News;

class Category extends Model
{
    protected $table = "theloai";
    protected $fillable = [
        'Ten', 'TenKhongDau',
    ];

    public function loaitin()
    {
    	return $this->hasMany(Type::class, 'idTheLoai', 'id');
    }

    public function tintuc()
    {
    	return $this->hasManyThrough(News::class, Type::class, 'idTheLoai', 'idLoaiTin');
    }
}

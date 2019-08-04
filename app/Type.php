<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\News;

class Type extends Model
{
    protected $table = "loaitin";
    protected $fillable = [
        'idTheLoai', 'Ten', 'TenKhongDau',
    ];

    public function theloai()
    {
    	return $this->belongsTo(Category::class, 'idTheLoai', 'id');
    }

    public function tintuc()
    {
    	return $this->hasMany(News::class, 'idLoaiTin', 'id');
    }
}

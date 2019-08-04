<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;
use App\Comment;
use App\Like;

class News extends Model
{
    protected $table = "tintuc";
    protected $fillable = [
        'TieuDe', 'TieuDeKhongDau', 'TomTat', 'NoiDung', 'Hinh', 'NoiBat', 'SoLuotXem', 'idLoaiTin', 'PheDuyet',
    ];

    public function loaitin()
    {
    	return $this->belongsTo(Type::class, 'idLoaiTin', 'id');
    }

    public function comment()
    {
    	return $this->hasMany(Comment::class, 'idTinTuc', 'id');
    }

    public function like()
    {
        return $this->hasMany(Like::class, 'idTinTuc', 'id');
    }
}

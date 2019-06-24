<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Slide;

class Slide extends Model
{
    //
    protected $table = "slide";
    protected $fillable = [
        'Ten', 'Hinh', 'NoiDung', 'link',
    ];
}

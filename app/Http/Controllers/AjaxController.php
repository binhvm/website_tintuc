<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\TypeRequest;
use App\Type;
use App\Category;

class AjaxController extends Controller
{
    //
    public function getLoaiTin($idTheLoai)
    {
    	$loaitin = Type::where('idTheLoai', $idTheLoai)->get();
    	foreach ($loaitin as $lt) {
    		echo "<option value='".$lt->id."'>".$lt->Ten."</option>";
    	}
    }
}
?>
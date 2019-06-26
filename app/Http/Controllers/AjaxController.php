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
    	$types = Type::where('idTheLoai', $idTheLoai)->get();
    	foreach ($types as $type) {
    		echo "<option value='".$type->id."'>".$type->Ten."</option>";
    	}
    }
}
?>
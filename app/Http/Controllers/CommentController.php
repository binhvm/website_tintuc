<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    //
    public function getXoa($id, $idTinTuc)
    {
    	$comment = Comment::find($id);
    	$comment->delete();

    	return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao', 'Xóa bình luận thành công.');
    }

    public function postComment(Request $request)
    {
    	$comment = new Comment;
    	$comment->idUser = $request->idUser;
    	$name = $request->User;
    	$comment->idTinTuc = $request->idTinTuc;
    	$comment->NoiDung = $request->NoiDung;
    	$comment->save();

        return json_encode([$comment, $name]);
    }
}

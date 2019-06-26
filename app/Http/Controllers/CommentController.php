<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    //
    public function getXoa($id, $idTinTuc)
    {
    	$comment = Comment::findOrFail($id);
    	$comment->delete();

    	return redirect('admin/news/sua/'.$idTinTuc)->with('thongbao', 'Xóa bình luận thành công.');
    }

    public function postComment(Request $request)
    {
        $input = $request->only('idUser', 'idTinTuc', 'NoiDung');
    	$name = $request->User;
        $comment = Comment::create($input);

        return json_encode(['comment' => $comment, 'name' => $name]);
    }
}
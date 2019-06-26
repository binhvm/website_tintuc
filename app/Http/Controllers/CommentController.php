<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Like;

class CommentController extends Controller
{
    //
    public function getDelete($id, $idTinTuc)
    {
    	$comment = Comment::findOrFail($id);
    	$comment->delete();

    	return redirect('admin/news/edit/'.$idTinTuc)->with('notification', 'Xóa bình luận thành công.');
    }

    public function postComment(Request $request)
    {
        $input = $request->only('idUser', 'idTinTuc', 'NoiDung');
    	$name = $request->User;
        $comment = Comment::create($input);

        return json_encode(['comment' => $comment, 'name' => $name]);
    }

    public function postLike(Request $request)
    {
        $check = Like::where(['idUser' => $request->idUser, 'idTinTuc' => $request->idTinTuc])->first();
        if ($check) {
            $check->delete();

            return response()->json(['success' => true, 'status' => Like::notlike, 'check' => $check]);
        }else{
            $input = $request->all();
            $like = Like::create($input);

            return response()->json(['success' => true, 'status' => Like::liked, 'check' => $check]);
        }
    }
}
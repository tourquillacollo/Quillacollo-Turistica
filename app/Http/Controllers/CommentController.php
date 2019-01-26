<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/20/19
 * Time: 3:16 PM
 */

namespace TUSIMO\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use TUSIMO\Lugares;
use TUSIMO\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Lugares $lugar)
    {
        $comment = new Comment();
        $comment->content = $request->get('content');
        $comment->parent_id = $request->get('parent_id');
        $comment->user_id = \auth()->id();

        print_r($lugar);
        $lugar->comments()->save($comment);

        //return \redirect()->route('posts.show', $lugar);
    }

    public function show($idLocation) {

        $comments = DB::table('comments')
            ->where('lugares_id', $idLocation)
            ->get();
       // print_r($comments);
        return View::make('site.showlocation')->with('comments', $comments);
    }

    public function getComments($idLocation) {
        $sql = "SELECT u.name, u.email, c.content,c.rate, c.like, c.created_at
                FROM lugares l, comments c, users u
                where l.id = c.lugares_id
                      AND c.user_id = u.id
                      AND l.id = ?
                ORDER BY c.created_at ASC
                ";
        $comments = DB::select($sql, array($idLocation));

        return response() -> json([
            "success" => true,
            "comments" => $comments
        ], 200);
    }

    public function saveComment(Request $request) {
        $comment = new Comment();
        $comment->content = $request->get('content');
        $comment->parent_id = 1;
        $comment->user_id = $request->get('id_user');
        $comment->lugares_id =$request->get('id_location');
        $comment->like = $request->get('like');
        $comment->rate = $request->get('rate');

        $comment->save();

        return response() -> json([
            "success" => true,
            "comments" => $comment
        ], 200);
    }
}
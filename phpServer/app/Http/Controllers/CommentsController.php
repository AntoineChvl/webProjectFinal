<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CommentsController extends Controller
{

    public function index(Request $request)
    {

        $comments = Comment::latest()->where('image_past_events_id', '=', $request->input('image_past_events_id'))->get();


        return Response::json($comments);
    }

    public function add(Request $request)
    {
        $commentData = array('content' => $request->input('content'), 'user_id' => $request->input('user_id'), 'image_past_events_id' => $request->input('image_past_events_id'));
        Comment::create($commentData);
    }

    public function remove(Request $request)
    {
        //
    }


}

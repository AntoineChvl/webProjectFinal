<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Image;
use App\ImagePastEvent;
use App\Mail\NotificationMembers;
use App\Mail\OrderConfirmMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        if(User::auth())
        {
            $commentData = array('content' => $request->input('content'), 'user_id' => User::auth()->id, 'image_past_events_id' => $request->input('image_past_events_id'));
            Comment::create($commentData);
        }

    }

    public function commentsEvent($uploadedImageId)
    {

       $imagePastEventId = ImagePastEvent::where('image_id', '=', $uploadedImageId)->first()->id;
       $imageToCheckComments = Image::where('id', '=', $uploadedImageId)->first();

       return view('admin.commentsAdministration', compact('imagePastEventId', 'imageToCheckComments'));
    }

    public function allByEvent()
    {
        $comments = Comment::where('image_past_events_id', '=', request()->input('uploadedImageId'))->where('is_validated', '=', '1')->get();
        $commentsJSON = [];

        for($i = 0; $i < $comments->count(); $i++)
        {
            $commentsJSON[$i] =array('content' => $comments[$i]->content, 'user' => User::find($comments[$i]->user_id), 'comment_id' => $comments[$i]->id);
        }

        return Response::json(array('data' =>$commentsJSON));
    }

    public function updateCommentStatus(Request $request)
    {
        if(User::auth())
        {
            Comment::where('id', '=', $request->input('data'))->first()->validate();
            $commentupdated = Comment::find($request->input('data'))->first();
            $commentUser = User::find($commentupdated->user_id);
            $commentToMail = array('type' => 'commentaire', 'content' => $commentupdated->content, 'date' => $commentupdated->updated_at, 'user' => $commentUser->firstname.' '.$commentUser->lastname);
            if(User::auth()->statusLvl == 3)
            {
                Mail::to(User::auth()->email)->send(new NotificationMembers($commentToMail));
            }
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Event;
use App\Images;
use App\ImagesPastEvent;
use App\Like;
use App\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{

    public function show(Event $event, ImagesPastEvent $image)
    {
        // Check if the image is associated with the event
        if(ImagesPastEvent::find($image->id)->event_id == $event->id)
        {

            $isConnected = false;
            $userId = 0;

            if(User::auth())
            {
                $isConnected = true;
                $userId = User::auth()->id;
            }

            return view('events.imageEvent', compact('image', 'event', 'userId', 'isConnected'));
        }

        return redirect('events');
    }


    public function publishImage(Request $request)
    {

       if($request->hasfile('image'))
       {
           $this->validateImage();
           $imageName = $request->file('image');
           $storedImage = Images::storeImage($imageName);

           Event::latest()->first()->update([
               'image_id' => $storedImage,
           ]);
       }
    }


    public function publishPastEvent(Request $request, $previousEventNId)
    {
        if($request->hasfile('image'))
        {
            $this->validateImage();
            $imageName = $request->file('image');
            $storedImage = Images::storeImage($imageName);

            ImagesPastEvent::insert([
               'event_id' => $previousEventNId,
               'image_id' => $storedImage,
            ]);
        }
    }


    public function uploadImagePastEvent(Request $request)
    {
        /*Get the event number from which the request has been made*/
        $previousEventPath = explode('/', parse_url(url()->previous(), PHP_URL_PATH));
        $previousEventId = $previousEventPath[2];

        // If the event exists
        if(Event::where('id', '=', $previousEventId)->count() > 0)
        {
            $this->publishPastEvent($request, $previousEventId);
        }
        return back();
    }


    public function imagesByEvent()
    {
        $eventInput = request()->input('event');
        return ImagesPastEvent::imagesByEvent($eventInput);
    }

    public function updateImage(Request $request)
    {
        $image = $request->input('data');
        ImagesPastEvent::where('image_id', '=', $image)->first()->validate();
    }


    public function validateImage()
    {
        return request()->validate([
            'image' => 'required|file|image|max:5000|mimes:jpeg,jpg,png,gif',
        ]);
    }



}

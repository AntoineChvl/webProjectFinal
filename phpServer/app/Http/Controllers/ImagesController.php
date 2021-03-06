<?php

namespace App\Http\Controllers;

use App\Event;
use App\Image;
use App\ImagePastEvent;
use App\Mail\NotificationMembers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use phpDocumentor\Reflection\File;
use ZanySoft\Zip\Zip;


class ImagesController extends Controller
{

    /* Display a single image related to an event */
    public function show(Event $event, ImagePastEvent $image)
    {
        // Check if the image is associated with the event
        if(ImagePastEvent::find($image->id)->event_id == $event->id)
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

    /* Upload an image on a past event */
    public function uploadImagePastEvent(Request $request)
    {
        /*Get the event number from which the request has been made*/
        $previousEventPath = explode('/', parse_url(url()->previous(), PHP_URL_PATH));
        $previousEventId = $previousEventPath[2];

        // If the event exists
        if(Event::where('id', '=', $previousEventId)->count() > 0)
        {
            $storedImage = $this->publishImage($request);
            ImagePastEvent::insert([
                'event_id' => $previousEventId,
                'image_id' => $storedImage,
            ]);
        }
        return back();
    }

    /* Publish an image related to an event */
    public function publishImage(Request $request)
    {
       if($request->hasfile('image'))
       {
           $this->validateImage();
           $storedImage = Image::storeImage($request->file('image'));
           return $storedImage;
       }
    }

    /* Get all images related to a specific past event, posted by users */
    public function imagesByEvent()
    {
        $eventInput = request()->input('event_id');
        return ImagePastEvent::imagesByEvent($eventInput);
    }

    /* Soft deleting of an image */
    public function updateImage(Request $request)
    {
        if(User::auth())
        {
            $imageChecked = ImagePastEvent::where('image_id', '=', $request->input('data'))->first();
            $imageChecked->validate();
            $imageData = array('type' => 'IMAGE', 'content' => $imageChecked->image->path, 'user' => User::find($imageChecked->image->user_id)->lastname);

            if(User::auth()->statusLvl == 3)
            {
                Mail::to(User::auth()->email)->send(new NotificationMembers($imageData));
            }

            return Response::json($imageData);
        }


    }

    /* Download all image uploaded */
    public function download()
    {
        $zip = Zip::create(public_path('images.zip'))->add(public_path('storage/imagesUploaded/', true))->close();
        return Response::download('images.zip')->deleteFileAfterSend(true);
    }

    /* Check the image has the right attributes */
    public function validateImage()
    {
        return request()->validate([
            'image' => 'required|file|image|max:5000|mimes:jpeg,jpg,png,gif',
        ]);
    }

}

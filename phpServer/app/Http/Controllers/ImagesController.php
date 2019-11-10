<?php

namespace App\Http\Controllers;

use App\Event;
use App\Images;
use App\ImagesPastEvent;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{

    /**
     * Store a newly created image in storage.
     *
     * @param Request $request
     * @param Event $event
     * @return Request
     */
    public function publishImage(Request $request)
    {

       if($request->hasfile('image'))
       {
           $storedImage = $this->storeImage($request);

           Event::latest()->first()->update([
               'image_id' => $storedImage,
           ]);
       }
    }


    public function publishPastEvent(Request $request, $previousEventNId)
    {

        if($request->hasfile('image'))
        {
            $storedImage = $this->storeImage($request);

            ImagesPastEvent::insert([
               'event_id' => $previousEventNId,
               'image_id' => $storedImage,
            ]);


        }
    }

    public function validateImage()
    {
        return request()->validate([
            'image' => 'required|file|image|max:5000|mimes:jpeg,jpg,png,gif',
        ]);
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

    public function storeImage(Request $request)
    {
        $this->validateImage();

        $image = $request->file('image');

        $imageExtension = $image->getClientOriginalExtension();

        $imageName = time().'.'.$imageExtension;
        $image->storeAs('imagesUploaded', $imageName, 'public');
        Image::make(public_path('storage/imagesUploaded/'.$imageName))->resize(300,300)->save();

        $storedImage = Images::insertGetId([
            'path' => $imageName,
            'user_id' => 1,
        ]);

        return $storedImage;
    }







}

<?php

namespace App\Http\Controllers;

use App\Event;
use App\Images;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Event $event
     * @return Request
     */
    public function store(Request $request)
    {

       if($request->hasfile('image'))
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

           Event::latest()->first()->update([
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
}

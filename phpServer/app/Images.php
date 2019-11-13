<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class Images extends Model
{
    protected $fillable = [
        'path', 'user_id'
    ];

    public static function storeImage($imageName)
    {

        $image = $imageName;

        $imageExtension = $imageName->getClientOriginalExtension();

        $imageName = time().'.'.$imageExtension;
        $image->storeAs('imagesUploaded', $imageName, 'public');
        Image::make(public_path('storage/imagesUploaded/'.$imageName))->resize(300,300)->save();

        $storedImage = self::insertGetId([
            'path' => $imageName,
            'user_id' => 1,
        ]);

        return $storedImage;
    }




}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image as ImagesIntervention;

class Image extends Model
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
        ImagesIntervention::make(public_path('storage/imagesUploaded/'.$imageName))->resize(300,300)->save();

        $storedImage = self::insertGetId([
            'path' => $imageName,
            'user_id' => User::auth()->id,
        ]);

        return $storedImage;
    }

}

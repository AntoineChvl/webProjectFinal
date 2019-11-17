<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;

class ImagePastEvent extends Model
{
    /* Authorize fields of the table to be filled */
    protected $fillable = [
        'event_id', 'image_id', 'is_validated', 'restricted_at'
    ];

    protected $table="images_past_events";

    /* Get the image details */
    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    /* Get the likes associated to the image */
    public function likes()
    {
        return $this->hasMany(Like::class, 'images_past_events_id');
    }

    /* Get the event the image has been posted on */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /* Soft deleting of the image */
    public function validate()
    {
        $this->is_validated = 0;
        $this->restricted_at = now();
        $this->save();
    }

    /* Load images related to a specific event, for datatables purpose */
    public static function imagesByEvent($eventInput)
    {
        $imagesByEvent = self::where('event_id', '=', $eventInput)->where('is_validated', '=', '1')->get();
        $imagesPath = [];

        for($i = 0; $i < $imagesByEvent->count(); $i++)
        {
            $imagesPath[$i] = array('image_path' => $imagesByEvent[$i]->image->path, 'image_id' => $imagesByEvent[$i]->image->id, 'event_name' => $imagesByEvent[$i]->event->name);
        }

        return Response::json(array('data' => $imagesPath));
    }

}

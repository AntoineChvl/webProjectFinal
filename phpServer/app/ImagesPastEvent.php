<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;

class ImagesPastEvent extends Model
{
    protected $fillable = [
        'event_id', 'image_id', 'is_validated', 'restricted_at'
    ];

    public function image()
    {
        return $this->belongsTo(Images::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'images_past_events_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function validate()
    {
        $this->is_validated = 0;
        $this->restricted_at = now();
        $this->save();
    }

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

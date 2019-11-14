<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content', 'user_id', 'image_past_events_id', 'is_validated', 'restricted_at'
    ];

    public function validate()
    {
        $this->is_validated = 0;
        $this->restricted_at = now();
        $this->save();
    }

    public function imagePastEvent()
    {
        return $this->belongsTo(ImagePastEvent::class);
    }


}

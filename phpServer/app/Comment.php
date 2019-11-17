<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/* Our class to represent our Comments table in our database */
class Comment extends Model
{
    /* Authorize fields of the table to be filled */
    protected $fillable = [
        'content', 'user_id', 'image_past_events_id', 'is_validated', 'restricted_at'
    ];

    /* Soft deleting of a comment, only display the ones who have is_validated set to 1 */
    public function validate()
    {
        $this->is_validated = 0;
        $this->restricted_at = now();
        $this->save();
    }

    /* Get the image the comment has been posted on */
    public function imagePastEvent()
    {
        return $this->belongsTo(ImagePastEvent::class);
    }


}

$(document).ready(function () {

        /* Manage likes */

        $('.heartLike').on('click', function(e){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const imageId = getImageId();

            /* Add one like and color the heart in red */
            if($('#like').hasClass('far'))
            {
                changeHeartAppearance('far', 'fas');
                postAjax('/likeImage/', imageId);

                /* Remove the like and uncolor the heart */
            } else {

                changeHeartAppearance('fas', 'far');
                postAjax('/unlikeImage/', imageId);
            }
        });
});

/* Insert or remove the like in our database table */
function postAjax(url, data)
{
    $.ajax({
        method: 'POST', // Type of response and matches what we said in the route
        url: url, // This is the url we gave in the route
        data: {'images_past_events_id' : data}, // a JSON object to send back
        success: function(response){ // What to do if we succeed
        },
        error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        }
    });
}

/* Color or not the like's heart in red */
function changeHeartAppearance(removeClass, addClass)
{
    $('#like').removeClass(removeClass);
    $('#like').addClass(addClass);
}

/* Extract the image id from the URI */
function getImageId()
{
    let url = $(location).attr('href');
    let urlsplit = url.split('/');
    return urlsplit[urlsplit.length-1];
}

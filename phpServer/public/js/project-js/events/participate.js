$(document).ready(function () {

    /* Manage participation to events */

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#participateToEvent').on('click', function(e)
    {

        const eventId = getEventId();

        /* Add participation */
        if($('#participateToEvent').hasClass('submit-button'))
        {

            changeButtonAppearance('submit-button', 'confirm-button', 'Inscris !');
            postAjax('/participateEvent', eventId);

            /* Remove participation */
        } else {

            changeButtonAppearance('confirm-button', 'submit-button', "Participer à l'évènement !");
            postAjax('/unparticipateEvent', eventId);

        }
    })
});

/* Add a participation row in our database */
function postAjax(url, data)
{
    $.ajax({
        method: 'POST', // Type of response and matches what we said in the route
        url: url, // This is the url we gave in the route
        data: {'event_id' : data}, // a JSON object to send back
        success: function(response){ // What to do if we succeed
        },
        error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        }
    });
}

/* Load different appearance depending on if the user participates or not */
function changeButtonAppearance(removeClass, addClass, buttonValue)
{
    $('#participateToEvent').removeClass(removeClass);
    $('#participateToEvent').addClass(addClass);
    $('#participateToEvent').html(buttonValue);
}

/* Extract the event id from the URI */
function getEventId()
{
    let url = $(location).attr('href');
    let urlsplit = url.split('/');
    return urlsplit[urlsplit.length-1];
}

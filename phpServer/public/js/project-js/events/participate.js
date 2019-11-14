$(document).ready(function () {


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#participateToEvent').on('click', function(e)
    {

        const eventId = getEventId();

        if($('#participateToEvent').hasClass('submit-button'))
        {

            changeButtonAppearance('submit-button', 'confirm-button', 'Inscris !');
            postAjax('/participateEvent', eventId);

        } else {

            changeButtonAppearance('confirm-button', 'submit-button', "Participer à l'évènement !");
            postAjax('/unparticipateEvent', eventId);

        }
    })
});


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

function changeButtonAppearance(removeClass, addClass, buttonValue)
{
    $('#participateToEvent').removeClass(removeClass);
    $('#participateToEvent').addClass(addClass);
    $('#participateToEvent').html(buttonValue);
}

function getEventId()
{
    let url = $(location).attr('href');
    let urlsplit = url.split('/');
    return urlsplit[urlsplit.length-1];
}

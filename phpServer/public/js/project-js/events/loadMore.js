$(document).ready(function () {

    /* Load more events when the user clicks on a button */

    /* Load more parameters, to memorize the last set of events loaded */
    var skip = 0;
    var skipPastEvent = 0;
    var _html = '';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /* Load more for recent events */
    $('#loadMoreRecent').on('click', function(e){
        e.preventDefault();
        skip += 3;
        ajaxMoreData('recentEventsList', 2, skip, 'loadMoreRecent');
    });

    /* Load more for past events */
    $('#loadMorePast').on('click', function(e){
        e.preventDefault();
        skipPastEvent += 3;
        ajaxMoreData('pastEventsList', 3, skipPastEvent, 'loadMorePast');
    });

    /* Call the controller method to get new events to display */
    function ajaxMoreData(buttonId, typeOfEventsId, skipValue, buttonLoadValue)
    {


        $.ajax({
            method: 'GET',
            url: '/events/more-data',
            data: {'skip' : skipValue,
                'typeOfEvents': typeOfEventsId,
            },
            success: function(response){
                /* Display the new loaded events in HTML semantic articles, to respect our SEO semantic choices */
                $.each(response, function(index, value){
                    _html += '<article class="singleEvent col-md-4">';
                    _html += '<h3>'+value.name+'</h3>';
                    _html += '<img src=http://127.0.0.1:8000/storage/imagesUploaded/'+value.image_path+' class="eventMainImage" alt="Image décrivant l\'évènement organisé par le BDE !">';
                    _html += '<a href='+value.show_path+' class="btn btn-dark">Visiter l\'évènement</a>';
                    _html += '</article>';
                });

                /* Make sure there is no display mismatch when the number of events to load in not equal to 3, the number of events displayed per row */
                if(response.length < 3 && response.length > 0)
                {
                    console.log(response.length);
                    $('#'+buttonLoadValue).remove();
                    _html += '<article class="singleEvent col-md-4">';
                    _html += '</article>';
                    if(response.length == 1)
                    {
                        _html += '<article class="singleEvent col-md-4">';
                        _html += '</article>';
                    }
                }

                if(response.length == 0)
                {
                    $('#'+buttonLoadValue).remove();
                }

                $('#'+buttonId).prepend(_html);
                _html = '';
            },

            error: function(jqXHR, textStatus, errorThrown) {
            }
        })
    }



});



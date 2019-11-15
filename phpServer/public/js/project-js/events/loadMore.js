$(document).ready(function () {

    var skip = 0;
    var skipPastEvent = 0;

    var _html = '';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#loadMoreRecent').on('click', function(e){
        e.preventDefault();
        skip += 3;
        ajaxMoreData('recentEventsList', 2, skip, 'loadMoreRecent');
    });

    $('#loadMorePast').on('click', function(e){
        e.preventDefault();
        skipPastEvent += 3;
        ajaxMoreData('pastEventsList', 3, skipPastEvent, 'loadMorePast');
    });

    function ajaxMoreData(buttonId, typeOfEventsId, skipValue, buttonLoadValue)
    {


        $.ajax({
            method: 'GET',
            url: '/events/more-data',
            data: {'skip' : skipValue,
                'typeOfEvents': typeOfEventsId,
            },
            success: function(response){

                $.each(response, function(index, value){
                    _html += '<article class="singleEvent col-md-4">';
                    _html += '<h3>'+value.name+'</h3>';
                    _html += '<img src=http://127.0.0.1:8000/storage/imagesUploaded/'+value.image_path+' class="eventMainImage" alt="Image décrivant l\'évènement organisé par le BDE !">';
                    _html += '<a href='+value.show_path+' class="btn btn-dark">Visiter l\'évènement</a>';
                    _html += '</article>';
                });
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



$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    var route = $('meta[name="route-name"]').attr('content');
    var validateRoute = "/events/";
    var tableName = "eventsList";


    $('#eventsList').removeClass('d-none');

    removeElement(validateRoute, 'DELETE', tableName, 'event_id');

    $('#eventsList').DataTable( {
        destroy: true,
        responsive: true,
        "pageLength": 3,

        "ajax": {
            "type": "GET",
            "url": route },
        "columns":[
            { "data": "event_name" },
            { "data": "event_image",
                "render": function(data,type,row)
                {
                    return '<img src=http://127.0.0.1:8000/storage/imagesUploaded/'+data+'>';
                }
            },
            { "data": "event_description" },
            { "data": "event_location" },
            { "data": "event_price" },
            { "data": "event_id",
                "render": function(data,type,row)
                {
                    return '<a class="btn submit-button remove" id='+data+' href=/events/'+data+'>Supprimer l\'évènement</a>'+' '+'<a class="btn submit-button" id='+data+' href=/events/'+data+'/edit >Modifier l\'évènement</a>';
                }
            },
        ],
    } );




});

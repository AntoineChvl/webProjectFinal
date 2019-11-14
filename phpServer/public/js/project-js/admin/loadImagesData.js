$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#eventChoice').on('change', (function(e){

        var selectedOption = $(this).children('option:selected').val().split('t');
        var eventSelected = selectedOption[selectedOption.length-1];
        var route = $('meta[name="route-name"]').attr('content');
        var validateRoute = "/api/espace-admin/images/validate/";
        var tableName = "eventImages";

        $('#eventImages').removeClass('d-none');

        removeElement(validateRoute, tableName, 'image_id');

        $('#eventImages').DataTable( {
            destroy: true,
            responsive: true,

            "ajax": {
                "type": "GET",
                "url": route,
                "data": {
                    "event_id": eventSelected
                }
            },
            "columns":[
                { "data": "image_path",
                    "render": function(data,type,row)
                    {
                        return '<img src=http://127.0.0.1:8000/storage/imagesUploaded/'+data+'>';
                    }
                },
                { "data": "event_name"
                },
                { "data": "image_id",
                    "render": function(data,type,row)
                    {
                        return '<a class="btn submit-button remove" id='+data+' href="/api/espace-admin/images/validate/'+data+'">Supprimer la photo</a>'+' '+'<a class="btn submit-button" id='+data+' href=/espace-admin/comments/validate/'+data+'>Commentaires</a>';
                    }
                },
            ],
        } );

    }))


});

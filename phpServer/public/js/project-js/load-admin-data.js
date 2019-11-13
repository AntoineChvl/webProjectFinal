$(document).ready(function () {


    $('#eventChoice').on('change', (function(e){
        var selectedOption = $(this).children('option:selected').val().split('t');
        var eventSelected = selectedOption[selectedOption.length-1];
        var route = $('meta[name="route-name"]').attr('content');
        var validateRoute = "/espace-admin/images/validate/";

        $('#eventImages').removeClass('d-none');



        $('#eventImages').on('click', '.remove', function (e) {
            e.preventDefault();

            var table = $('#eventImages').DataTable();
            var rowObject = table.row($(this).closest('tr')).data()['image_id'];

            $.ajax({
                method: 'POST', // Type of response and matches what we said in the route
                url: validateRoute, // This is the url we gave in the route
                data: {'image' : rowObject}, // a JSON object to send back
                success: function(response){ // What to do if we succeed
                    console.log("success");
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log('fail');
                }
            });

            table
                .row($(this).parents('tr'))
                .remove()
                .draw();
        });

        $('#eventImages').DataTable( {
            destroy: true,
            responsive: true,

            "ajax": {
                "type": "GET",
                "url": route,
                "data": {
                    "event": eventSelected
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
                        return '<a class="btn submit-button remove" id='+data+' href=/espace-admin/images/validate/'+data+'>Supprimer la photo</a>';
                    }
                },
            ]
        } );

    }))
});

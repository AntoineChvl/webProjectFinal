$(document).ready(function () {

    $('#eventChoice').on('change', (function(e){

        var selectedOption = $(this).children('option:selected').val().split('t');
        var eventSelected = selectedOption[selectedOption.length-1];
        var route = $('meta[name="route-name"]').attr('content');


        $('#usersParticipation').removeClass('d-none');

        //removeElement(validateRoute, tableName, 'comment_id');

        $('#usersParticipation').DataTable( {
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
                { "data": "user_id" },
                { "data": "user_first_name" },
                { "data": "user_last_name" },
            ],
        } );




    }))




});


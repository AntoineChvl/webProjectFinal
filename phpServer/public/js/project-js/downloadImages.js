$(document).ready(function () {


    $('#downloadImages').on('mouseup', function(e){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'GET', // Type of response and matches what we said in the route
            url: '/api/espace-admin/images/deleteZip', // a JSON object to send back
            success: function(response){ // What to do if we succeed
                console.log("success");
            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log("fail");
            }
        });
    });
});

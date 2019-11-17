$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let url = $(location).attr('href');
    let urlsplit = url.split('/');
    let imagePastEventId = urlsplit[urlsplit.length-1];

        $('.addComment').on('click', function(e){

            console.log(imagePastEventId);
           $.ajax({
                method: 'POST', // Type of response and matches what we said in the route
                url: '/addComment', // This is the url we gave in the route
                data: {'content' : $('.commentValue').val(),
                    'image_past_events_id': imagePastEventId,
                }, // a JSON object to send back
                success: function(response){ // What to do if we succeed
                    updateComments();
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                }
            });

        });

        $(window).onload = updateComments();


        function updateComments()
        {

            $('.comments').empty();

            $.ajax({
                url: "/api/getComments",
                type: "GET", //send it through get method
                data: {
                    'image_past_events_id': imagePastEventId
                },
                success: function(res) {
                    console.log(res);

                    for(var i=0; i < res.length; i++)
                    {
                        var dateParts = res[i].created_at.split("-");
                        var dateDetails = dateParts[2].split(' ');
                        var jsDate = new Date(dateParts[0], dateParts[1] - 1);
                        $('.comments').append("<p><span class='commentContent'>"+res[i].content+"</span>, ajouté le "+jsDate.toLocaleDateString('fr-FR')+", par "+ res[i].user+"</p>");
                    }
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        }
})

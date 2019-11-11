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
                    'user_id': 1,
                    'image_past_events_id': imagePastEventId,
                }, // a JSON object to send back
                success: function(response){ // What to do if we succeed
                    updateComments();
                    console.log('Success');
                    console.log(response);
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail

                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });

        });

        $(window).onload = updateComments();


        function updateComments()
        {

            $('.comments').empty();

            $.ajax({
                url: "/getComments",
                type: "GET", //send it through get method
                data: {
                    'image_past_events_id': imagePastEventId
                },
                success: function(res) {
                    console.log(res);
                    for(var i=0; i < res.length; i++)
                    {
                        $('.comments').append("<p><span class='commentContent'>"+res[i].content+"</span>, ajouté à "+res[i].created_at+"</p>");
                    }
                },
                error: function(xhr) {
                    //Do Something to handle error
                }
            });
        }
})

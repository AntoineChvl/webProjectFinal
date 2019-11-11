$(document).ready(function () {


        $('.heartLike').on('click', function(e){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const imageId = $(this).attr('id');
            if($('#'+imageId).hasClass('far'))
            {
                $('#'+imageId).removeClass('far');
                $('#'+imageId).addClass('fas');

                $.ajax({
                    method: 'POST', // Type of response and matches what we said in the route
                    url: '/likeImage', // This is the url we gave in the route
                    data: {'images_past_events_id' : imageId,
                            'user_id': 1}, // a JSON object to send back
                    success: function(response){ // What to do if we succeed
                        console.log('Success');
                        console.log(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail

                        console.log(JSON.stringify(jqXHR));
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });

            } else {

                $('#'+imageId).removeClass('fas');
                $('#'+imageId).addClass('far');

                $.ajax({
                    method: 'POST', // Type of response and matches what we said in the route
                    url: '/unlikeImage', // This is the url we gave in the route
                    data: {'images_past_events_id' : imageId,
                        'user_id': 1}, // a JSON object to send back
                    success: function(response){ // What to do if we succeed
                        console.log('Success');
                        console.log(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail

                        console.log(JSON.stringify(jqXHR));
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });



            }
        });



});

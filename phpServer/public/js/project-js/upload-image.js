$(document).ready(function () {

    $('#participateToEvent').click(function () {
            $('#participateToEvent').fadeOut();
            $('#uploadImageForm').fadeIn(200);
    });

    $(".custom-file-input").on("change", function() {
        // Take the name of the file (last element returned after \\ in the file name)
        var fileName = $(this).val().split("\\").pop();

        // Add the image name to the label, for UI purpose
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    











});



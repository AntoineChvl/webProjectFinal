function readURL(input) {

    /* Display the image before uploading */


    if (input.files && input.files[0]) {
        const reader = new FileReader();

        /* Read the image content and display it */
        reader.onload = function(e) {
            $('#imagePreview').fadeIn().attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

/* Change image display every time the user changes the file */
$("#imageReadyToUpload").change(function() {
    readURL(this);
});

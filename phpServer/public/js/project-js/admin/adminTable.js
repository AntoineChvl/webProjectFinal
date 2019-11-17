const removeElement = function (validateRoute, ajaxMethod, tableName, fieldContent)
{

    /* Remove the datatable row when the user click on it, while it call the right controller method to update our database  */
    $('#'+tableName).on('click', '.remove', function (e) {
        e.preventDefault();

        var table = $('#'+tableName).DataTable();
        var rowObject = table.row($(this).closest('tr')).data()[fieldContent];
        console.log(rowObject);
        if(ajaxMethod == 'DELETE')
        {
            validateRoute += rowObject;
        }


        $.ajax({
            method: ajaxMethod, // Type of response and matches what we said in the route
            url: validateRoute, // This is the url we gave in the route
            data: {'data' : rowObject}, // a JSON object to send back
            success: function(response){ // What to do if we succeed
            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
            }
        });
        table
            .row($(this).parents('tr'))
            .remove()
            .draw();
    });
}

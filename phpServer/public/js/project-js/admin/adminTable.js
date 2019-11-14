const removeElement = function (validateRoute, tableName, fieldContent)
{

    $('#'+tableName).on('click', '.remove', function (e) {
        e.preventDefault();

        var table = $('#'+tableName).DataTable();
        var rowObject = table.row($(this).closest('tr')).data()[fieldContent];
        $.ajax({
            method: 'POST', // Type of response and matches what we said in the route
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

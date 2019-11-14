$(document).ready(function () {

    $('#eventChoice').on('change', (function(e){

        var selectedOption = $(this).children('option:selected').val().split('t');
        var eventSelected = selectedOption[selectedOption.length-1];
        var route = $('meta[name="route-name"]').attr('content');


        $('#usersParticipation').removeClass('d-none');

        $('#usersParticipation').DataTable( {
            destroy: true,
            dom: 'Bfrtip',
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal( {
                        header: function ( row ) {
                            var data = row.data();
                            return 'Details for '+data[0]+' '+data[1];
                        }
                    } ),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                        tableClass: 'table'
                    } )
                }
            },
            buttons: [
                'csvHtml5',
                'pdfHtml5',
            ],

            "ajax": {
                "type": "GET",
                "url": route,
                "data": {
                    "event_id": eventSelected
                }
            },
            "columns":[
                { "data": "event_id" },
                { "data": "event_name" },
                { "data": "user_id" },
                { "data": "user_first_name" },
                { "data": "user_last_name" },
            ],
        } );

    }))

});


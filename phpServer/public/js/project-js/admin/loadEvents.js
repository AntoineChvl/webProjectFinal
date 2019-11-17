$(document).ready(function () {

    /* Load the admin datatable that manages events */

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    /* The datatables properties */
    var route = $('meta[name="route-name"]').attr('content');
    var validateRoute = "/espace-admin/events/validate";
    var tableName = "eventsList";

    /* Make the datatable appear */
    $('#eventsList').removeClass('d-none');

    /* Call adminTable.js to remove a row on click */
    removeElement(validateRoute, 'POST', tableName, 'event_id');

    /* Configure the datatable with the events information, render buttons to make actions on rows */
    $('#eventsList').DataTable( {
        destroy: true,
        "autoWidth": false,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Details';
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        },
        "pageLength": 3,

        "ajax": {
            "type": "GET",
            "url": route },
        "columns":[
            { "data": "event_name" },
            { "data": "event_image",
                "render": function(data,type,row)
                {
                    return '<img src=http://127.0.0.1:8000/storage/imagesUploaded/'+data+'>';
                }
            },
            { "data": "event_description" },
            { "data": "event_location" },
            { "data": "event_price" },
            { "data": "event_id",
                "render": function(data,type,row)
                {
                    return '<a class="btn submit-button remove" id='+data+' href=/events/'+data+'>Supprimer l\'évènement</a>'+' '+'<a class="btn submit-button" id='+data+' href=/events/'+data+'/edit >Modifier l\'évènement</a>';
                }
            },
        ],
    } );




});

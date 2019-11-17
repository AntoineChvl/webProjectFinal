$(document).ready(function () {

    /* Load the admin datatable that manages categories */

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    /* The datatables properties */
    var route = $('meta[name="route-name"]').attr('content');
    var validateRoute = "/shop/category/";
    var tableName = "categoriesList";

    /* Make the datatable appear */
    $('#categoriesList').removeClass('d-none');

    /* Call adminTable.js to remove a row on click */
    removeElement(validateRoute, 'DELETE', tableName, 'category_id');

    /* Load the datatable with the categories information, making it responsive */
    $('#categoriesList').DataTable( {
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
            { "data": "category_name" },
            { "data": "category_id",
                "render": function(data,type,row)
                {
                    return '<a class="btn submit-button remove" id='+data+' href=/shop/category/'+data+'>Supprimer la catégorie</a>';
                }
            },
        ],
    } );




});




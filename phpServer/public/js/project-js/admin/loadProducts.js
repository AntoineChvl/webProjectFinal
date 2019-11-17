$(document).ready(function () {

    /* Load the admin datatable that manages existing products on the shop */

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    /* The datatables properties */
    var route = $('meta[name="route-name"]').attr('content');
    var validateRoute = "/shop/product/";
    var tableName = "productsList";


    /* Make the datatable appear */
    $('#productsList').removeClass('d-none');


    /* Remove a product when the user decide to delete it */
    removeElement(validateRoute, 'DELETE', tableName, 'product_id');


    /* Configure the datatable to display all the products information */
    $('#productsList').DataTable( {
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
            { "data": "product_name" },
            { "data": "product_image",
                "render": function(data,type,row)
                {
                    return '<img src=http://127.0.0.1:8000/storage/imagesUploaded/'+data+'>';
                }
            },
            { "data": "product_price" },
            { "data": "product_id",
                "render": function(data,type,row)
                {
                    validateRoute ='/shop/product/'+ data;
                    return '<a class="btn submit-button remove" id='+data+' href=/shop/product/'+data+'>Supprimer le produit</a>'+' '+'<a class="btn submit-button" id='+data+' href=/shop/product/'+data+'/edit >Modifier le produit</a>';
                }
            },
        ],
    } );




});


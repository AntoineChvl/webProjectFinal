$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    var route = $('meta[name="route-name"]').attr('content');
    var imageUploadedId = $('meta[name="imagePastEventId"]').attr('content');
    var validateRoute = "/shop/product/";
    var tableName = "productsList";


    $('#productsList').removeClass('d-none');

    removeElement(validateRoute, 'DELETE', tableName, 'product_id');

    $('#productsList').DataTable( {
        destroy: true,
        responsive: true,
        "pageLength": 3,

        "ajax": {
            "type": "GET",
            "url": route,
            "data": {
                "uploadedImageId": imageUploadedId
            }
        },
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
                    return '<a class="btn submit-button remove" id='+data+' href=/shop/product/'+data+'>Supprimer le produit</a>';
                }
            },
        ],
    } );




});


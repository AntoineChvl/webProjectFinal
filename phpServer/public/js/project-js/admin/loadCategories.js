$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    var route = $('meta[name="route-name"]').attr('content');
    var validateRoute = "/shop/category/";
    var tableName = "categoriesList";


    $('#categoriesList').removeClass('d-none');

    removeElement(validateRoute, 'DELETE', tableName, 'category_id');

    $('#categoriesList').DataTable( {
        destroy: true,
        responsive: true,
        "pageLength": 3,

        "ajax": {
            "type": "GET",
            "url": route },
        "columns":[
            { "data": "category_name" },
            { "data": "category_id",
                "render": function(data,type,row)
                {
                    return '<a class="btn submit-button remove" id='+data+' href=/shop/category/'+data+'>Supprimer la catégorie</a>'+' '+'<a class="btn submit-button" id='+data+' href=/shop/category/'+data+'/edit >Modifier la catégorie</a>';
                }
            },
        ],
    } );




});




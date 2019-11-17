$(document).ready(function () {

        /* Load the admin datatable that manages comments posted on images */

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        /* The datatables properties */
        var route = $('meta[name="route-name"]').attr('content');
        var imageUploadedId = $('meta[name="imagePastEventId"]').attr('content');
        var validateRoute = "/espace-admin/comments/validate";
        var tableName = "imageComments";

        /* Make the datatable appear */
        $('#imageComments').removeClass('d-none');


        /* Call adminTable.js to remove a row on click */
        removeElement(validateRoute, 'POST', tableName, 'comment_id');

        /* Configure the datatable with the comments properties, call the controller method to get back comments posted on a specific image */
        $('#imageComments').DataTable( {
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

            "ajax": {
                "type": "GET",
                "url": route,
                "data": {
                    "uploadedImageId": imageUploadedId
                }
            },
            "columns":[
                { "data": "content" },
                { "data": "user",
                    "render": function(data,type,row)
                    {
                        return data.firstname+' '+data.lastname+'';
                    }
                },
                { "data": "comment_id",
                    "render": function(data,type,row)
                    {
                        return '<a class="btn submit-button remove" id='+data+' href=/api/espace-admin/images/validate/'+data+'>Supprimer le commentaire</a>';
                    }
                },
            ],
        } );




});


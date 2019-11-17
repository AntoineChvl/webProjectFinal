$(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        var route = $('meta[name="route-name"]').attr('content');
        var imageUploadedId = $('meta[name="imagePastEventId"]').attr('content');
        var validateRoute = "/espace-admin/comments/validate";
        var tableName = "imageComments";


        $('#imageComments').removeClass('d-none');

        removeElement(validateRoute, 'POST', tableName, 'comment_id');

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


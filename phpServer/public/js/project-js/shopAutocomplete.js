$.ajax({
            method: 'GET', // Type of response and matches what we said in the route
            url: '/api/shop/autocomplete', // This is the url we gave in the route
            data: {'data' : rowObject}, // a JSON object to send back
            success: function(response){ // What to do if we succeed
                var options = {
                    data: response,
                    getValue: "name",
                    template: {
                        type: "links",
                        fields: {
                            link: "productLink"
                        }
                    }
                };
                $("#search-bar").easyAutocomplete(options);
            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
            }
        });





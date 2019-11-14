$(document).ready(function (){
 $.ajax({
            method: 'GET', // Type of response and matches what we said in the route
            url: 'http://localhost:8000/api/shop/autocomplete', // This is the url we gave in the route
            success: function(response){ // What to do if we succeed
                var options = {
                    data: response,
                    getValue: "name",
                    template: {
                        type: "links",
                        fields: {
                            link: "productLink"
                        }
                    },
                    list: {
                        match: {
                            enabled: true
                        }
                    },
                    theme: "dark"
                };
                $("#search-bar").easyAutocomplete(options);
            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
            }
        });
});


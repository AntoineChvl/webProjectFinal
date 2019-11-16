$(document).ready(function () {

    var alphaRegex = new RegExp('^[a-zA-Z]*$');
    var mailRegex = new RegExp('^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$');
    var passwordLetterRegex = new RegExp('[A-Z]');
    var passwordDigitRegex = new RegExp('[0-9]');

    $('#firstName').keyup(function(e)
    {
        if($('#firstName').val().length > 0 && ($('#firstName').val().length < 3 || $('#firstName').val().length > 16 || !alphaRegex.test($('#firstName').val()) ))
        {
            $("#firstNameMismatch").removeClass('d-none');
        } else {
            $("#firstNameMismatch").addClass('d-none');
            $("#firstName").css("border", "2px outset green");
        }

    })

    $('#lastName').keyup(function(e){
        if($('#lastName').val().length > 0 && ($('#lastName').val().length < 3 || $('#lastName').val().length > 25 || !alphaRegex.test($('#lastName').val()) ))
        {
            $("#lastNameMismatch").removeClass('d-none');
        } else {
            $("#lastNameMismatch").addClass('d-none');
            $("#lastName").css("border", "2px outset green");
        }
    });

    $('#emailInscription').keyup(function(e){

        if(alphaRegex.test($('#emailInscription').val()))
        {
            $("#emailMismatch").removeClass('d-none');
        } else {
            $("#emailMismatch").addClass('d-none');
            $("#emailInscription").css("border", "2px outset green");
        }

    });

    $('#passwordInscription').keyup(function(e){

        if(!passwordLetterRegex.test($('#passwordInscription').val()) || !passwordDigitRegex.test($('#passwordInscription').val()))
        {
            $("#passwordRegexMismatch").removeClass('d-none');

        } else {
            $("#passwordRegexMismatch").addClass('d-none');
            $("#passwordRegexMismatch").css("border", "2px outset green");
            $(".champ").keyup(function (e) {


                if ($("#passwordInscription").val() != $("#passwordConfirmation").val()) {

                    $("#passwordInscription").css("border", "2px outset red");
                    $("#passwordConfirmation").css("border", "2px outset red");
                    $("#passwordMismatch").css("display", "block");
                    $("#passwordMatch").css("display", "none");

                } else if ($("#passwordInscription").val() == $("#passwordConfirmation").val() && $("#passwordInscription").val() != "") {
                    $("#passwordInscription").css("border", "2px outset green");
                    $("#passwordConfirmation").css("border", "2px outset green");
                    $("#passwordMismatch").css("display", "none");
                    $("#passwordMatch").css("display", "block");
                }

            });
        }
    });




    $("#inscriptionButton").click(function(e) {

        if ($("#passwordInscription").val() != $("#passwordConfirmation").val()) {
            e.preventDefault();
        }
    });
});




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

$("#inscriptionButton").click(function(e) {

    if ($("#passwordInscription").val() != $("#passwordConfirmation").val()) {
        e.preventDefault();
    }
});

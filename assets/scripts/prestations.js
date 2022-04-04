$(function () {

    $("#modifier").hide();

    $("#buttonConsulterModifier").click(function () {
        $("#modifier").show();
        $("#ajouter").hide();
    });

    $("#buttonAjouter").click(function () {
        $("#modifier").hide();
        $("#ajouter").show();
    });

});
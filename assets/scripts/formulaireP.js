$(function () {



    function isMail(str) {
        //console.log(str);
        let pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return str.match(pattern);
    }

    function all() {
        $("#nom").val("");
        $("#prenom").val("");
        $("#activite").val("");
        $("#adresse").val("");
        $("#numero").val("");
        $("#mdp").val("");
        $("#mail").val("");
        $("h1").text("Message expédié!");
        $("h1").css("color", "green");
        $("#gif").hide();
    }

    //console.log($("input").length);

    $("#gif").hide();
    $("#button").on("click", function () { /*Nom&Prénom*/
        // let valeurNom = $(#"nam").val();
        // let valeurSujet = $("#sujet").val();
        // let valeurMail = $("#mail").val();
        // let valeurMessage = $("#subject").val();
        // let attrNom = $(#"nam").attr("name");
        // let attrSujet = $("#sujet").attr("name");
        // let attrMail = $("#mail").attr("name");
        // let attrMessage = $("#subject").attr("name");

        // $(".reponse").html(attrNom + " = " + valeurNom + "<br>" + attrSujet + " = " + valeurSujet + "<br>" + attrMail + " = " + valeurMail + "<br>"  + attrMessage + " = " + valeurMessage )

        // alert('ee');
        // return false;
        let i = ($("input").length) - 1;

        if ($("#nom").val() === "") {
            $("#nom").css("border", "1px solid red");
            $("#nom1").text("(obligatoire)");
            $("#nom1").css("color", "red");
            $("#nom1").css("float", "right");
        } else {
            $("#nom1").hide();
            $("#nom").css("border", "1px solid green");
            i = i - 1
        }

        if ($("#prenom").val() === "") {
            $("#prenom").css("border", "1px solid red");
            $("#prenom1").text("(obligatoire)");
            $("#prenom1").css("color", "red");
            $("#prenom1").css("float", "right");
        } else {
            $("#prenom1").hide();
            $("#prenom").css("border", "1px solid green");
            i = i - 1
        }

        if ($("#activite").val() === "") {
            $("#activite").css("border", "1px solid red");
            $("#activite1").text("(obligatoire)");
            $("#activite1").css("color", "red");
            $("#activite1").css("float", "right");
        } else {
            $("#activite1").hide();
            $("#activite").css("border", "1px solid green");
            i = i - 1
        }

        if ($("#adresse").val() === "") {
            $("#adresse").css("border", "1px solid red");
            $("#adresse1").text("(obligatoire)");
            $("#adresse1").css("color", "red");
            $("#adresse1").css("float", "right");
        } else {
            $("#adresse1").hide();
            $("#adresse").css("border", "1px solid green");
            i = i - 1
        }

        if ($("#numero").val() === "") {
            $("#numero").css("border", "1px solid red");
            $("#numero1").text("(obligatoire)");
            $("#numero1").css("color", "red");
            $("#numero1").css("float", "right");
        } else {
            $("#numero1").hide();
            $("#numero").css("border", "1px solid green");
            i = i - 1
        }


        if ($("#mdp").val() === "") {
            $("#mdp").css("border", "1px solid red");
            $("#mdp1").text(" (obligatoire)");
            $("#mdp1").css("color", "red");
            $("#mdp1").css("float", "right");
        } else {
            $("#mdp1").hide();
            $("#mdp").css("border", "1px solid green");
            i = i - 1
        }

        let emailTest = $("#mail").val();

        if ($("#mail").val() === "") {
            $("#mail").css("border", "1px solid red");
            $("#mail1").text(" (obligatoire)");
            $("#mail1").css("color", "red");
            $("#mail1").css("float", "right");
        } else if (isMail(emailTest)) {
            $("#mail1").hide();
            $("#mail").css("border", "1px solid green");
            i = i - 1
        } else {

            $("#mail").css("border", "1px solid orange");
            $("#mail1").text(" (invalide)");
            $("#mail1").css("color", "orange");
            $("#mail1").css("float", "right");
        };

        if (i == 0) {
            $("#gif").show();
            setTimeout(all, 2000)
        }

        let valeurs = {
            "nom": $('#nom').val(),
            "prenom": $('#prenom').val(),
            "activite": $('#activite').val(),
            "adresse": $('#adresse').val(),
            "email": $('#mail').val(),
            "numero": $('#numero').val(),
            "mdp": $('#mdp').val()
        };

        // $.ajax({
        //     url: 'php/formulaire.php',
        //     type: 'POST',
        //     data: valeurs,
        //     error: function () {
        //         alert('Erreur sur PHP !');
        //     },
        //     success: function (retour) {
        //         if (retour === 'err') {
        //             $('.testAjax').html("Erreur de traitement !");
        //         } else {
        //             $('.testAjax').html(retour);
        //         }
        //     },
        // });
    }


    );



});

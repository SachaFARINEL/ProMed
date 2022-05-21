$(function () {
    idCard = undefined;
    $(document).on('click', '.pClicked', function () {
        idCard = $(this).attr("id").substr(-1);
        return idCard;
    });

    $(document).on('click', '.annulerRDV', function () {
        let idButton = $(this).attr("id");
        console.log($(this).attr("id"))
        let idPraticien = (idButton.split("/"))[0];
        let date = (idButton.split("/"))[1];

        let valeurs = {
            "id_praticien": idPraticien,
            "date": date,
        };




        $.ajax({
            type: 'POST',
            url: './?controller=ajax&task=annulerRDV',
            data: valeurs,
            error: function () {
                alert('Erreur sur PHP !');
            },
            success: function (res) {

                if (res === 'err') {
                    $('#ex1').html("Erreur de traitement !");
                } else {
                    if (res) {
                        $('#p' + idCard).html('<span> Le rendez-vous est annulé <img style="width:3%; margin-left: 0.2rem" src="./assets/images/check.png" </span>');
                        $('#card' + idCard).css({ 'background-color': 'rgba(232, 137, 158, 0.2)' })
                    }
                }
            },
            complete: function () {
            }
        });
    });
});
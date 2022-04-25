$(function () {

    function pause(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    async function afficherDate() {
        while (true) {
            var cejour = new Date();
            var options = { weekday: "long", year: "numeric", month: "long", day: "2-digit" };
            var date = cejour.toLocaleDateString("fr-FR", options);
            var heure = ("0" + cejour.getHours()).slice(-2) + ":" + ("0" + cejour.getMinutes()).slice(-2);
            var dateheure = date + " " + heure;
            var dateheure = dateheure.replace(/(^\w{1})|(\s+\w{1})/g, lettre => lettre.toUpperCase());
            $('#affichageHeure').text(dateheure);
            await pause(1000);
        }
    }
    afficherDate();
});




// Fonction qui permet de charger les pages dans la section dynamique
$(document).ready(function () {

    // Charge la page d'accueil par défaut
    $("#dynamic-content").load("sections/accueil.php");

    // Ecoute la navBar
    $("a.nav-link").click(function (e) {

        e.preventDefault(); // Empêche le comportement de lien par défaut

        let page = $(this).attr("href"); // Obtient le lien href

        $.ajax({
            url: page,
            success: function (data) {

                // Met à jour le contenu de la section
                $("#dynamic-content").html(data);

            },
            error: function () {
                alert("Erreur lors du chargement de la page");
            }
        });
    });

    // Ecoute le bouton se connecter
    $("a.btn-outline-success").click(function (e) {

        e.preventDefault(); // Empêche le comportement de lien par défaut

        let page = $(this).attr("href"); // Obtient le lien href

        $.ajax({
            url: page,
            success: function (data) {

                // Met à jour le contenu de la section
                $("#dynamic-content").html(data);

            },
            error: function () {
                alert("Erreur lors du chargement de la page login");
            }
        });
    });

    // Ecoute le footer
    $("a.footer-link").click(function (e) {

        e.preventDefault(); // Empêche le comportement de lien par défaut

        let page = $(this).attr("href"); // Obtient le lien href

        $.ajax({
            url: page,
            success: function (data) {

                // Met à jour le contenu de la section
                $("#dynamic-content").html(data);

            },
            error: function () {
                alert("Erreur lors du chargement du footer");
            }
        });
    });
});


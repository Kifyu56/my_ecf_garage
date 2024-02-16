
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

    // Écoute le bouton se connecter
    document.querySelector("a#loginButton").addEventListener("click", function (e) {
        e.preventDefault(); // Empêche le comportement de lien par défaut

        fetch("sections/login.php")
            .then(response => response.text())
            .then(html => {
                document.getElementById("dynamic-content").innerHTML = html;
            })
            .catch(error => {
                console.error('Erreur lors du chargement du formulaire de connexion:', error);
            });
    });

    // Ecoute les bouton de la navBar services
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

    // Écoute la soumission du formulaire de connexion

    $(document).on('submit', '#loginForm', function (e) {
        e.preventDefault(); // Empêche l'envoi normal du formulaire

        let formData = new FormData(this);
        fetch('API/verifyLogin.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    // Actualisez la page pour refléter l'état de connexion
                    window.location.reload();
                } else {
                    
                    alert(result.message); // Afficher le message d'erreur
                }
            })

            .catch(error => {
                console.error('Erreur:', error);
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

// Modifie les horaires d'ouverture
document.addEventListener("DOMContentLoaded", function () {
    const horaires = [
        { jour: 'Lundi', heures: '9h - 18h' },
        { jour: 'Mardi', heures: '9h - 18h' },
        { jour: 'Mercredi', heures: '9h - 18h' },
        { jour: 'Jeudi', heures: '9h - 18h' },
        { jour: 'Vendredi', heures: '9h - 18h' },
        { jour: 'Samedi', heures: '9h - 12h' },
        { jour: 'Dimanche', heures: 'Fermé' }
    ];

    const tbody = document.getElementById('openingHoursTable').getElementsByTagName('tbody')[0];

    horaires.forEach(horaire => {
        let row = tbody.insertRow();
        let cellJour = row.insertCell(0);
        let cellHeures = row.insertCell(1);
        cellJour.textContent = horaire.jour;
        cellHeures.textContent = horaire.heures;
    });
});



$(document).ready(function () {

    // Charge la page d'accueil par défaut
    $("#dynamic-content").load("sections/accueil.html");

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

    // Ecoute les boutons en savoir plus
    $(document).on('click', 'a.btn.btn-outline-info', function (e) {

        e.preventDefault(); // Empêche le comportement de lien par défaut

        let page = $(this).attr("href"); // Obtient le lien href

        $.ajax({
            url: page,
            success: function (data) {

                // Met à jour le contenu de la section
                $("#dynamic-content").html(data);

            },
            error: function () {
                alert("Erreur lors du chargement de la page, a partir du bouton en savoir plus sur la page" + page);
            }
        });
    });

    // Ecouter le bouton se connecter #loginButton
    $(document).on('click', '#loginButton', function (e) {
        e.preventDefault(); // Empêche le comportement de lien par défaut

        // Charge la page de connexion dans le contenu dynamique
        $("#dynamic-content").load("/sections/login.html", function (response, status, xhr) {
            if (status == "error") {
                console.error("Erreur lors du chargement du formulaire de connexion: " + xhr.status + " " + xhr.statusText);
            }
        });
    });

    // Ecoute le bouton se déconnecter #logoutButton
    $(document).on('click', '#logoutButton', function (e) {
        e.preventDefault(); // Empêche le comportement par défaut du lien

        $.ajax({
            url: '/sections/logout.php', // Script PHP qui traite la déconnexion
            type: 'POST', // Méthode de la requête
            success: function (response) {
                let data = JSON.parse(response);
                if (data.success) {
                    // Actions à effectuer après une déconnexion réussie
                    // Par exemple, rediriger vers 'index.php' ou recharger une partie de la page
                    window.location.href = '/index.php';
                }
            },
            error: function () {
                alert("Une erreur est survenue lors de la communication avec le serveur.");
            }
        });
    });


    // Écoute la soumission du formulaire de connexion
    $(document).on('submit', '#loginForm', function (e) {
        e.preventDefault(); // Empêche l'envoi normal du formulaire

        $.ajax({
            url: 'API/verifyLogin.php', // script PHP qui traite la connexion
            type: 'POST',
            data: $(this).serialize(), // Sérialise les données du formulaire pour l'envoi
            dataType: 'json', // Le type de données que l'on attend en retour
            success: function (response) {

                if (response.success) {
                    // Recharge la page pour refléter l'état connecté de l'utilisateur
                    window.location.reload(true);
                } else {
                    alert(response.message || "Une erreur est survenue lors de la tentative de connexion."); // Affiche un message d'erreur si la connexion échoue
                }
            },
            error: function (xhr, status, error) {
                // Gestion des erreurs de la requête AJAX
                alert("Erreur de connexion : " + xhr.status + " " + error);
            }
        });
    });



    // Écoute les clics sur les boutons dans la section des services
    document.addEventListener("DOMContentLoaded", function () {
        // Liste des ID des boutons pour les écouteurs d'événements
        const serviceButtonsIds = ['mechanics', 'bodywork', 'maintenance', 'other'];

        // Fonction pour charger le contenu du service
        function loadServiceContent(serviceId) {
            // Assurez-vous que le nom du fichier correspond à l'ID du bouton
            const page = `sections/services/${serviceId}.html`;

            fetch(page)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(html => {
                    $('#dynamic-contentService').html(html);
                })
                .catch(error => {
                    console.error('Erreur lors du chargement des informations du service:', error);
                    alert("Erreur lors du chargement des informations du service.");
                });
        }

        // Écouteurs d'événements pour chaque bouton de service
        ['mechanics', 'bodywork', 'maintenance', 'other'].forEach(serviceId => {
            $(`#${serviceId}`).click(function () {
                loadServiceContent(serviceId);
            });
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


});








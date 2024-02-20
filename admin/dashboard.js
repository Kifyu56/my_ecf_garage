$(document).ready(function () {
    // Lorsque l'utilisateur clique sur le bouton de création
    $('#createUser').click(function () {
        // Récupère les valeurs des champs de formulaire
        let userData = {
            last_name: $('#user_name').val(),
            first_name: $('#user_firstname').val(),
            email: $('#user_email').val(),
            phone: $('#user_phone').val(),
            birthdate: $('#user_birthdate').val(),
            user_id: $('#user_identifiant').val(),
            password: $('#user_password').val()
        };

        // Envoie les données à create_user.php via AJAX
        $.ajax({
            url: '/API/crud_users/create_user.php', // L'URL du script PHP qui va traiter les données
            type: 'POST',
            data: userData, // Les données à envoyer
            dataType: 'json', // Le type de données attendues en retour
            success: function (response) {
                if (response.success) {
                    alert("Utilisateur créé avec succès !");
                    // Réinitialiser le formulaire ou rediriger l'utilisateur
                    $('#createUserForm')[0].reset();
                } else {
                    alert("Erreur : " + response.message);
                }
            },
            error: function (xhr, status, error) {
                // Gestion des erreurs de la requête AJAX
                alert("Erreur lors de la création de l'utilisateur : " + error);
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Fonction pour charger les horaires actuels et les afficher dans le footer
    function loadCurrentHours() {
        fetch('/api/opening-hours')
            .then(response => response.json())
            .then(data => {
                // Ici, vous devez mettre à jour les champs du formulaire avec les données reçues
                console.log(data); // Pour le debug
                // Exemple : document.getElementById('openningTimeAm').value = data.lundi.am.open;
                // Répétez pour chaque champ
            })
            .catch(error => console.error('Erreur lors du chargement des horaires :', error));
    }

    // Fonction pour enregistrer les horaires
    document.getElementById('dailyOpeningHoursForm').addEventListener('submit', function (e) {
        e.preventDefault();

        // Récupération des valeurs du formulaire
        const selectedDay = document.getElementById('selectedDay').value;
        const openingTimeAM = document.getElementById('openningTimeAm').value;
        const closingTimeAM = document.getElementById('closingTimeAM').value;
        const openingTimePM = document.getElementById('openingTimePM').value;
        const closingTimePM = document.getElementById('closingTimePM').value;
        const isClosed = document.getElementById('closedDay').checked;

        // Préparation de l'objet à envoyer
        const data = {
            day: selectedDay,
            openingTimeAM,
            closingTimeAM,
            openingTimePM,
            closingTimePM,
            isClosed
        };

        fetch('/api/opening-hours', {
            method: 'POST', // ou 'PUT' si vous faites une mise à jour
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(data => {
                console.log('Succès :', data);
                // Ici, vous pourriez par exemple recharger les horaires pour afficher les changements
                loadCurrentHours();
            })
            .catch((error) => {
                console.error('Erreur:', error);
            });
    });

    // Initialiser le formulaire avec les horaires actuels au chargement de la page
    loadCurrentHours();
});


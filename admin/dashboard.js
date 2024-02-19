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

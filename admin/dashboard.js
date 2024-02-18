// Création d'un utilisateur
document.getElementById('createUser').addEventListener('click', function () {
    const userData = {
        last_name: document.getElementById('user_name').value,
        first_name: document.getElementById('user_firstname').value,
        email: document.getElementById('user_email').value,
        phone: document.getElementById('user_phone').value,
        birthdate: document.getElementById('user_birthdate').value,
        username: document.getElementById('user_id').value,
        password: document.getElementById('user_password').value
    };

    fetch('/admin/dashboard_admin.html', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(userData),
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // afficher un message de succès ou en réinitialisant le formulaire
            if (data.success) {
                alert("Utilisateur créé avec succès !");
                // Réinitialiser le formulaire ou rediriger l'utilisateur
            } else {
                alert("Erreur : " + data.message);
            }
        })
        .catch((error) => {
            console.error('Error:', error);
            alert("Une erreur s'est produite lors de la création de l'utilisateur.");
        });
});

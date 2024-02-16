// Création d'un utilisateur
document.getElementById('createUser').addEventListener('click', function () {
    const userData = {
        name: document.getElementById('user_name').value,
        firstname: document.getElementById('user_firstname').value,
        email: document.getElementById('user_email').value,
        phone: document.getElementById('user_phone').value,
        birthdate: document.getElementById('user_birthdate').value,
        username: document.getElementById('user_identifiant').value,
        password: document.getElementById('user_password').value
    };

    fetch('/admin/dashboard_admin.php', {
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
        })
        .catch((error) => {
            console.error('Error:', error);
        });
});

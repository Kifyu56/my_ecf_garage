document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('loginForm');

    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            e.preventDefault(); // Empêche l'envoi normal du formulaire

            // Crée un objet FormData à partir du formulaire
            const formData = new FormData(loginForm);

            // Ajoute l'état de la case "Se souvenir de moi" à formData
            const rememberMe = document.getElementById('rememberMe').checked;
            formData.append('rememberMe', rememberMe);

            // Utilise `fetch` pour envoyer les données du formulaire
            fetch('API/verifyLogin.php', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Réponse réseau non OK');
                    }
                    return response.json(); // Parse la réponse en JSON
                })
                .then(data => {
                    if (data.success) {
                        // Si la connexion est réussie, recharge la page ou redirige l'utilisateur
                        window.location.reload(true);
                    } else {
                        // Affiche un message d'erreur si la connexion échoue
                        alert(data.message || "Une erreur est survenue lors de la tentative de connexion.");
                    }
                })
                .catch(error => {
                    // Gestion des erreurs de la requête fetch
                    alert("Erreur de connexion : " + error.message);
                });
        });
    }
});

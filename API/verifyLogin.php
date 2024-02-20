
<?php

// Commencez la session
session_start();

// Inclure le fichier de connexion à la base de données
require_once 'bdd_garageVparrot.php';

// En-tête pour autoriser les requêtes depuis n'importe quelle origine
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = $_POST['user_id'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM USERS WHERE user_id = :identifiant");
    $stmt->bindParam(':identifiant', $identifiant);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password_hash'])) {

        // Régénère l'ID de session pour la sécurité
        session_regenerate_id(true);

        // Stocker les informations de l'utilisateur dans la session
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_id'] = $user['user_id'];

        // Gère l'option "Se souvenir de moi"
        if (!empty($_POST['rememberMe'])) {
            // Définir la durée de vie du cookie, par exemple 30 jours
            $lifetime = 60;
            setcookie(session_name(), session_id(), time() + $lifetime, "/", "", isset($_SERVER["HTTPS"]), true);
        }

        echo json_encode(['success' => true, 'message' => 'Connexion réussie.']);

    } else {
        http_response_code(401);
        echo json_encode(['success' => false, 'message' => 'Identifiants incorrects.']);
    }
} else {
    http_response_code(405);
    
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
}

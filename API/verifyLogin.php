
<?php

session_start(); // Commencez la session

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
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['is_logged_in'] = true;

    } else {
        http_response_code(401);
        echo json_encode(['success' => false, 'message' => 'Identifiants incorrects.']);
    }
} else {
    http_response_code(405);
    
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
}

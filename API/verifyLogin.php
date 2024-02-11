<?php

session_start(); // Commencez la session en haut de votre script PHP

ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
// Connexion PDO à la base de données
try {
    $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=garage_parrot", 'root', '0~:0o5oSSSUZr!QU:0');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500); // Code d'état HTTP pour une erreur serveur
    echo json_encode(['success' => false, 'message' => "Erreur de connexion : " . $e->getMessage()]);
    exit; // Arrête l'exécution du script
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = $_POST['user_identifiant'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE user_identifiant = :identifiant");
    $stmt->bindParam(':identifiant', $identifiant);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['is_logged_in'] = true;

        echo json_encode(['success' => true, 'isAdmin' => $user['role'] === 'admin']);
    } else {
        http_response_code(401);
        echo json_encode(['success' => false, 'message' => 'Identifiants incorrects.']);
    }
} else {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
}

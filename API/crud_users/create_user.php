<?php
require_once 'bdd_garageVparrot.php'; // Connexion PDO

session_start();

// S'assurer que le contenu reçu est de type JSON
header("Content-Type: application/json");

// Réception des données envoyées par la méthode POST
$data = json_decode(file_get_contents("php://input"), true);

// Vérifier que tous les champs obligatoires sont présents
$requiredFields = ['email', 'password', 'last_name', 'first_name', 'phone', 'birthdate', 'user_identifiant'];
foreach ($requiredFields as $field) {
    if (empty($data[$field])) {
        // Un champ est manquant, arrêtez le script, en précisant le champ.
        echo json_encode(["success" => false, "message" => "Le champ $field est obligatoire."]);
        exit;
    }
}

// Vérifiez si l'email ou l'user_identifiant existe déjà
$stmt = $conn->prepare("SELECT user_id FROM USERS WHERE email = ? OR user_id = ?");
$stmt->execute([$data['email'], $data['user_id']]);
if ($stmt->fetch()) {
    echo json_encode(["success" => false, "message" => "L'email ou l'id est déjà utilisé."]);
    exit;
}


try {
    // Démarrer la transaction
    $conn->beginTransaction();

    // Insertion dans USERS incluant user_identifiant
    $stmt = $conn->prepare("INSERT INTO USERS (email, password_hash, role, user_identifiant) VALUES (?, ?, 'employee', ?)");
    $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);
    $stmt->execute([$data['email'], $passwordHash, $data['user_identifiant']]);
    $userId = $conn->lastInsertId();

    // Insertion dans EMPLOYEE
    $stmt = $conn->prepare("INSERT INTO EMPLOYEE (user_id, last_name, first_name, phone, birthdate) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$userId, $data['last_name'], $data['first_name'], $data['phone'], $data['birthdate']]);

    $conn->commit();
    echo json_encode(["success" => true, "message" => "Utilisateur créé avec succès"]);
} catch (PDOException $e) {
    $conn->rollBack();
    echo json_encode(["success" => false, "message" => "Erreur lors de la création de l'utilisateur: " . $e->getMessage()]);
}

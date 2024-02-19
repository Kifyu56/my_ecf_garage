<?php
require_once 'bdd_garageVparrot.php';

header("Content-Type: application/json");
$data = json_decode(file_get_contents("php://input"), true);

// Vérifier que tous les champs obligatoires sont présents
$requiredFields = ['user_id', 'last_name', 'first_name', 'email', 'phone', 'birthdate', 'password'];
foreach ($requiredFields as $field) {
    if (empty($data[$field])) {
        echo json_encode(["success" => false, "message" => "Le champ $field est obligatoire."]);
        exit;
    }
}


try {
    // Vérifier si l'utilisateur existe
    $stmt = $conn->prepare("SELECT user_id FROM USERS WHERE user_id = ?");
    $stmt->execute([$data['user_id']]);
    $user = $stmt->fetch();

    if (!$user) {
        echo json_encode(["success" => false, "message" => "Utilisateur non trouvé."]);
        exit;
    }

    // Mise à jour de l'utilisateur dans la table USERS
    $stmt = $conn->prepare("UPDATE USERS SET password_hash = ? WHERE user_id = ?");
    $stmt->execute([
        password_hash($data['password'], PASSWORD_DEFAULT), // Hachage du mot de passe
        $data['user_id']
    ]);

    // Mise à jour de l'utilisateur dans la table EMPLOYEE ou ADMINISTRATOR selon le rôle
    $stmt = $conn->prepare("UPDATE EMPLOYEE SET last_name = ?, first_name = ?, phone = ?, birthdate = ? WHERE user_id = ?");
    $stmt->execute([
        $data['last_name'],
        $data['first_name'],
        $data['phone'],
        $data['birthdate'],
        $data['user_id']
    ]);

    echo json_encode(["success" => true, "message" => "Informations de l'utilisateur mises à jour avec succès."]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Erreur lors de la mise à jour de l'utilisateur: " . $e->getMessage()]);
}

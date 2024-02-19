<?php
require_once 'bdd_garageVparrot.php'; // Adjust the path to your database connection file

header("Content-Type: application/json");

// Réception de l'ID de l'employé à supprimer
$data = json_decode(file_get_contents("php://input"), true);

// Vérification que l'ID utilisateur est présent
if (empty($data['user_id'])) {
    echo json_encode(["success" => false, "message" => "L'ID utilisateur est requis pour la suppression."]);
    exit;
}


try {
    // Commencer la transaction pour permettre un rollback en cas d'erreur
    $conn->beginTransaction();

    // Suppression des enregistrements associés dans la table EMPLOYEE
    $stmt = $conn->prepare("DELETE FROM EMPLOYEE WHERE user_id = ?");
    $stmt->execute([$data['user_id']]);

    // Suppression de l'enregistrement utilisateur dans la table USERS
    $stmt = $conn->prepare("DELETE FROM USERS WHERE user_id = ?");
    $stmt->execute([$data['user_id']]);

    // Si tout se passe bien, confirmer les modifications
    $conn->commit();

    // Vérifier si l'employé a été supprimé
    if ($stmt->rowCount() > 0) {
        echo json_encode(["success" => true, "message" => "L'utilisateur et ses informations associées ont été supprimés avec succès."]);
    } else {
        // Si aucune ligne n'a été affectée, aucun utilisateur avec cet ID n'a été trouvé
        $conn->rollBack();
        echo json_encode(["success" => false, "message" => "Aucun utilisateur trouvé avec cet ID."]);
    }
} catch (PDOException $e) {
    // En cas d'erreur, annuler la transaction
    $conn->rollBack();
    echo json_encode(["success" => false, "message" => "Erreur lors de la suppression de l'utilisateur : " . $e->getMessage()]);
}

?>
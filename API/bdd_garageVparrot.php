<?php




// Connexion PDO à la base de données
try {
    $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=,??", 'root', '??');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
    http_response_code(500); // Code d'état HTTP pour une erreur serveur
    echo json_encode(['success' => false, 'message' => "Erreur de connexion : " . $e->getMessage()]);
    exit; // Arrête l'exécution du script
}

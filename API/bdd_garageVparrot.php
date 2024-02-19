<?php


//$host = '127.0.0.1'; // Utilisez l'adresse IP locale si la base de données est sur le même serveur que votre script PHP
//$port = 3306; // Utilisez le port spécifique qui est indiqué dans votre commande mysql
//$dbname = 'garage_parrot'; // Le nom de votre base de données
//$user = 'root'; // Votre nom d'utilisateur de base de données
//$password = '0~:0o5oSSSUZr!QU:0'; // XAMPP utilise par défaut un mot de passe vide pour 'root'.

//try {
//    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $password);
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    
//} catch(PDOException $e) {
//    echo "Erreur de connexion : " . $e->getMessage();
//}


// Connexion PDO à la base de données
try {
    $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=garage_parrot", 'root', '0~:0o5oSSSUZr!QU:0');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
    http_response_code(500); // Code d'état HTTP pour une erreur serveur
    echo json_encode(['success' => false, 'message' => "Erreur de connexion : " . $e->getMessage()]);
    exit; // Arrête l'exécution du script
}

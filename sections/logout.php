<?php
session_start();

// Efface toutes les variables de session
session_unset();

// Détruit la session
session_destroy();

// Vérifie si le cookie de session existe et le supprime
if (isset($_COOKIE[session_name()])) {
    // Définit le cookie avec une date d'expiration dans le passé, pour le supprimer
    setcookie(session_name(), '', time() - 42000, '/');
}

echo json_encode(['success' => true]);

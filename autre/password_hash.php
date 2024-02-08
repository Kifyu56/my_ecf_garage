<?php
// Le mot de passe que Vincent Parrot à choisit
$password = "&éVincent_Parrotè&";

// Générer un hash sécurisé du mot de passe
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

echo $passwordHash; // Je récupere le hash généré
?>
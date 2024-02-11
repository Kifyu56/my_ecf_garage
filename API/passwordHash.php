<?php
$motDePasse = '&éVincent_Parrotè&'; // Remplacez 'votreMotDePasse' par le mot de passe que vous souhaitez hacher
$hachage = password_hash($motDePasse, PASSWORD_DEFAULT);

if (password_verify($motDePasse, $hachage)) {
    // Le mot de passe est correct
    echo "Le mot de passe est correct";
    echo $motDePasse;
    echo $hachage;
} else {
    // Le mot de passe est incorrect
    echo "Le mot de passe est incorrect";
}
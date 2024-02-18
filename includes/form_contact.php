<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["nom"]);
    $firstName = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["sujet"]);
    $message = htmlspecialchars($_POST["message"]);

    // Validation
    if (empty($name) || empty($firstName) || empty($email) || empty($subject) || empty($message)) {
        header("Location: ../contact.php?status=error");
        exit();
    }

    $toEmail = "";
    $mailHeaders = "From: " . $firstName . " " . $name . "<" . $email . ">\r\n";

    if (mail($toEmail, $subject, $message, $mailHeaders)) {
        header("Location: ../contact.php?status=success");
    } else {
        header("Location: ../contact.php?status=error");
    }
    exit();
}

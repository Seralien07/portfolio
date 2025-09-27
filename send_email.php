<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Vérification simple
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Merci de remplir correctement tous les champs.";
        exit;
    }

    $to = "seralienseralien@gmail.com"; // Remplace par ton email
    $subject = "Message de votre portfolio de $name";
    $body = "Nom: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Merci ! Votre message a été envoyé.";
    } else {
        echo "Désolé, une erreur est survenue. Veuillez réessayer plus tard.";
    }
} else {
    echo "Méthode invalide.";
}
?>

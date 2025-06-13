<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo "Méthode non autorisée.";
    exit;
}

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

if (!$email || empty($subject) || empty($message)) {
    echo "Tous les champs sont obligatoires.";
    exit;
}

$headers = "From: no-reply@dev-agile2.users.info.unicaen.fr\r\n";
$headers .= "Reply-To: no-reply@dev-agile2.users.info.unicaen.fr\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";

if (mail($email, $subject, $message, $headers)) {
    echo "E-mail envoyé avec succès à $email.";
} else {
    echo "Échec de l'envoi de l'e-mail.";
}
?>
<h1>Mail envoyé avec succés à nathanelie.06@gmail.com</h1>
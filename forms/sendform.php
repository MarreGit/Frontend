<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Invalid request");
}

$name = htmlspecialchars(trim($_POST["name"]));
$email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
$message = htmlspecialchars(trim($_POST["message"]));

if (!$name || !$email || !$message) {
    exit("All fields must be filled in correctly.");
}

$to = "info@frontendbymats.com";
$subject = "Meddelande från info Frontend";

$body = "Namn: $name\n";
$body .= "E-post: $email\n\n";
$body .= "Meddelande:\n$message";

$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8";

if (mail($to, $subject, $body, $headers)) {
    echo "✅ Meddelandet skickades!";
} else {
    echo "❌ Något gick fel. Försök senare..";
}

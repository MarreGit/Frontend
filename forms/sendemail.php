<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* 🛑 Honeypot */
    if (!empty($_POST['website'])) {
        exit; // Bot
    }

    /* 🛑 Grundvalidering */
    if (
        empty($_POST['name']) ||
        empty($_POST['email']) ||
        empty($_POST['message']) ||
        !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    ) {
        exit;
    }

    $to = "info@frontendbymats.com";
    $subject = "Nytt meddelande från webbplatsen";

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $messageText = htmlspecialchars($_POST['message']);

    $message = "Namn: $name\nE-post: $email\n\nMeddelande:\n$messageText";
    $headers = "From: $email";

    mail($to, $subject, $message, $headers);
}
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>Meddelande skickat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f7fa;
        }

        .success-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .success-box {
            background: #ffffff;
            padding: 40px 50px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 100%;
        }

        .success-icon {
            font-size: 48px;
            margin-bottom: 15px;
        }

        .success-box h1 {
            font-size: 28px;
            color: #2e7d32;
            margin-bottom: 10px;
        }

        .success-box p {
            font-size: 18px;
            color: #555;
        }

        .back-link {
            display: inline-block;
            margin-top: 25px;
            text-decoration: none;
            font-size: 16px;
            color: #2e7d32;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        /* 📱 Mobil */
        @media (max-width: 600px) {
            .success-box {
                padding: 30px 20px;
            }

            .success-box h1 {
                font-size: 22px;
            }

            .success-box p {
                font-size: 16px;
            }

            .success-icon {
                font-size: 40px;
            }
        }
    </style>
</head>
<body>

<div class="success-wrapper">
    <div class="success-box">
        <div class="success-icon">✅</div>
        <h1>Tack för ditt meddelande!</h1>
        <p>Vi återkommer så snart vi kan.</p>

        <a href="/" class="back-link">← Tillbaka till startsidan</a>
    </div>
</div>

</body>
</html>

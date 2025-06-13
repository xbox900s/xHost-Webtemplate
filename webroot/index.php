<?php
// PHP-Version abrufen
$phpVersion = phpversion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>xHost | System Check</title>
    <style>
        :root {
            --bg-light: #f9f9fb;
            --bg-dark: #1e1e2f;
            --text-light: #333;
            --text-dark: #f1f1f1;
            --accent: #00bcd4;
            --success: #4caf50;
            --warn: #ff9800;
            --card-bg-light: #ffffff;
            --card-bg-dark: #2c2c3e;
        }

        * {
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-dark);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 1rem;
        }

        .card {
            background-color: var(--card-bg-dark);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 0 20px rgba(0, 188, 212, 0.3);
            text-align: center;
            max-width: 600px;
            width: 100%;
        }

        h1 {
            font-size: 2.8rem;
            margin-bottom: 15px;
            color: var(--accent);
        }

        p {
            font-size: 1.2rem;
            margin: 10px 0;
            color: var(--text-dark);
        }

        .php-version {
            background: var(--accent);
            color: #fff;
            padding: 12px 25px;
            border-radius: 8px;
            display: inline-block;
            font-weight: bold;
            font-size: 1.4rem;
            margin-top: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0, 188, 212, 0.4);
        }

        .message {
            color: var(--success);
            font-weight: bold;
            font-size: 1.1rem;
            margin-top: 10px;
        }

        .webroot-message {
            color: var(--warn);
            font-weight: bold;
            font-size: 1.1rem;
            margin-top: 10px;
        }

        .footer {
            margin-top: 40px;
            font-size: 0.95rem;
            color: #aaa;
        }

        .footer a {
            color: var(--accent);
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .card {
                padding: 25px;
            }

            h1 {
                font-size: 2rem;
            }

            .php-version {
                font-size: 1.2rem;
                padding: 10px 20px;
            }
        }

        /* Fancy entrance animation */
        .card {
            animation: fadeInUp 0.7s ease-out both;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<div class="card">
    <h1>✅ xHost Server Online</h1>
    <p>Aktuelle PHP-Version:</p>
    <div class="php-version"><?php echo $phpVersion; ?></div>
    <div class="message">Der Webserver wurde erfolgreich installiert!</div>
    <div class="webroot-message">Lade deine Website-Dateien jetzt in den <code>webroot</code>-Ordner hoch.</div>
    <div class="footer">
        <p>&copy; 2025 xHost · Design by <a href="https://sigmaprods.dev" target="_blank">@sigmaprods</a></p>
    </div>
</div>

</body>
</html>

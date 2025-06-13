<?php
session_start();

// === Sprachumschaltung ===
$lang = $_GET['lang'] ?? $_SESSION['lang'] ?? 'de';
$_SESSION['lang'] = $lang;

// === Texte ===
$texts = [
    'de' => [
        'title' => 'xHost Server Status',
        'php_version' => 'Aktuelle PHP-Version',
        'server_running' => 'Dein Webserver läuft korrekt!',
        'upload_info' => 'Lade deine Website-Dateien in den "webroot"-Ordner hoch.',
        'current_time' => 'Server-Zeit',
        'your_ip' => 'Deine IP-Adresse',
        'root_path' => 'Webroot-Pfad',
        'change_lang' => 'Sprache wechseln',
        'toggle_mode' => 'Modus wechseln',
        'powered_by' => 'Design von',
    ],
    'en' => [
        'title' => 'xHost Server Status',
        'php_version' => 'Current PHP Version',
        'server_running' => 'Your web server is up and running!',
        'upload_info' => 'Place your website files in the "webroot" folder.',
        'current_time' => 'Server Time',
        'your_ip' => 'Your IP Address',
        'root_path' => 'Webroot Path',
        'change_lang' => 'Change Language',
        'toggle_mode' => 'Toggle Mode',
        'powered_by' => 'Design by',
    ]
];

$t = $texts[$lang];

// === Serverdaten ===
$phpVersion = phpversion();
$serverTime = date("Y-m-d H:i:s");
$userIP = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
$webroot = $_SERVER['DOCUMENT_ROOT'];
?>

<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>xHost</title>
    <style>
        :root {
            --bg-light: #f4f7fc;
            --bg-dark: #1b1c27;
            --text-light: #2c3e50;
            --text-dark: #ecf0f1;
            --accent: #00bcd4;
            --success: #4caf50;
            --warn: #ff9800;
            --card-light: #ffffff;
            --card-dark: #2a2b3d;
        }

        * {
            box-sizing: border-box;
            transition: 0.3s ease all;
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
            background-color: var(--card-dark);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 0 20px rgba(0, 188, 212, 0.3);
            text-align: center;
            max-width: 650px;
            width: 100%;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--accent);
        }

        .info {
            font-size: 1.1rem;
            margin: 10px 0;
        }

        .highlight {
            background-color: var(--accent);
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1.3rem;
            margin: 15px 0;
            display: inline-block;
        }

        .message {
            color: var(--success);
            margin-top: 15px;
        }

        .path-info {
            color: var(--warn);
            font-weight: bold;
            margin-top: 10px;
        }

        .footer {
            margin-top: 30px;
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

        .top-bar {
            position: absolute;
            top: 10px;
            right: 20px;
            display: flex;
            gap: 10px;
        }

        .top-bar a, .top-bar button {
            background: var(--accent);
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 0.9rem;
            cursor: pointer;
            text-decoration: none;
        }

        .top-bar a:hover, .top-bar button:hover {
            background: #0097a7;
        }

        @media (max-width: 600px) {
            .card {
                padding: 25px;
            }
            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

<div class="top-bar">
    <a href="?lang=<?= $lang === 'de' ? 'en' : 'de' ?>"><?= $t['change_lang'] ?></a>
    <button onclick="toggleTheme()"><?= $t['toggle_mode'] ?></button>
</div>

<div class="card">
    <h1>🌐 <?= $t['title'] ?></h1>

    <div class="info"><?= $t['php_version'] ?>:</div>
    <div class="highlight"><?= $phpVersion ?></div>

    <div class="info"><?= $t['current_time'] ?>: <strong><?= $serverTime ?></strong></div>
    <div class="info"><?= $t['your_ip'] ?>: <strong><?= $userIP ?></strong></div>
    <div class="path-info"><?= $t['root_path'] ?>: <br><code><?= $webroot ?></code></div>

    <div class="message">✅ <?= $t['server_running'] ?></div>
    <div class="path-info">📁 <?= $t['upload_info'] ?></div>

    <div class="footer">
        <p>&copy; 2025 xHost · <?= $t['powered_by'] ?> <a href="https://sigmaprods.dev" target="_blank">@sigmaprods</a></p>
    </div>
</div>

<script>
    // Dark/Light Toggle
    function toggleTheme() {
        const root = document.documentElement;
        const dark = getComputedStyle(root).getPropertyValue('--bg-dark');
        const isDark = getComputedStyle(document.body).backgroundColor === dark;

        if (isDark) {
            root.style.setProperty('--bg-dark', '#f4f7fc');
            root.style.setProperty('--card-dark', '#ffffff');
            root.style.setProperty('--text-dark', '#2c3e50');
        } else {
            root.style.setProperty('--bg-dark', '#1b1c27');
            root.style.setProperty('--card-dark', '#2a2b3d');
            root.style.setProperty('--text-dark', '#ecf0f1');
        }
    }
</script>

</body>
</html>

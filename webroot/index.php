<?php
// xHost Geblockte Website Template
// Design: Dunkelblau, modern, clean

$server_ip = $_SERVER['SERVER_ADDR'] ?? 'Unbekannt';
$server_port = $_SERVER['SERVER_PORT'] ?? 'Unbekannt';
$reason = isset($_GET['reason']) ? htmlspecialchars($_GET['reason']) : 'Nicht aufgesetzt';
<?php
// xHost Geblockte Website Template
// Design: Dunkelblau, modern, clean

$server_ip = $_SERVER['SERVER_ADDR'] ?? 'Unbekannt';
$server_port = $_SERVER['SERVER_PORT'] ?? 'Unbekannt';
$reason = isset($_GET['reason']) ? htmlspecialchars($_GET['reason']) : 'Nicht aufgesetzt';

// Exakt dein vorgegebener Mailtext (mit IP, Port und Grund eingefügt)
$mail_body = "Ich kann auf die Seite: ({$server_ip}:{$server_port}) aus dem Grund: ({$reason}) nicht zugreifen!%0A%0A"
    ."Ich bestätige, dass ich diese Email nicht bearbeitet habe. Unser Team wird dies prüfen!%0A%0A"
    ."Hier unterschreiben: ";

$mail_link = "mailto:support@bedmine.de?subject=Zugriff%20gesperrt&body=" . $mail_body;
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>xHost | Zugriff Gesperrt</title>
    <style>
        html, body {
            margin: 0; padding: 0; height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a1a2f, #102a4d);
            color: #fff;
            overflow: hidden;
            position: relative;
        }

        /* Canvas Fullscreen über allem, aber unter Container */
        #particle-canvas {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: 0;
            pointer-events: none;
        }

        .container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(8px);
            padding: 40px;
            border-radius: 15px;
            max-width: 500px;
            text-align: center;
            box-shadow: 0 0 20px rgba(0,0,0,0.4);
            position: relative;
            z-index: 1;
            margin: auto;
            top: 50%;
            transform: translateY(-50%);
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 10px;
            color: #4da3ff;
        }

        p {
            font-size: 1rem;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .reason {
            background: rgba(255, 255, 255, 0.1);
            padding: 10px;
            border-radius: 8px;
            font-weight: bold;
            color: #ff6b6b;
            margin-bottom: 20px;
        }

        a.button {
            display: inline-block;
            padding: 12px 25px;
            background: #4da3ff;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        a.button:hover {
            background: #1d75cc;
        }

        footer {
            font-size: 0.8rem;
            margin-top: 15px;
            color: rgba(255,255,255,0.6);
        }
    </style>
</head>
<body>
    <canvas id="particle-canvas"></canvas>
    <div class="container">
        <h1>🚫 Zugriff Gesperrt</h1>
        <p>Der Zugriff auf diese Website wurde von <strong>xHost</strong> blockiert.</p>
        <div class="reason">
            Grund: <?php echo $reason; ?>
        </div>
        <p>Falls du glaubst, dass dies ein Irrtum ist, kontaktiere bitte unseren Support.</p>
        <a href="<?php echo $mail_link; ?>" class="button">Support Kontaktieren</a>
        <footer>
            &copy; <?php echo date('Y'); ?> xʜᴏꜱᴛ ꜱᴛᴜᴅɪᴏꜱ
        </footer>
    </div>

    <script>
    (() => {
        const canvas = document.getElementById('particle-canvas');
        const ctx = canvas.getContext('2d');
        let width, height;

        const particles = [];
        const particleCount = 80;

        function resize() {
            width = window.innerWidth;
            height = window.innerHeight;
            canvas.width = width * devicePixelRatio;
            canvas.height = height * devicePixelRatio;
            canvas.style.width = width + 'px';
            canvas.style.height = height + 'px';
            ctx.setTransform(1,0,0,1,0,0);
            ctx.scale(devicePixelRatio, devicePixelRatio);
        }

        class Particle {
            constructor() {
                this.reset();
            }
            reset() {
                this.x = Math.random() * width;
                this.y = Math.random() * height;
                this.size = 1 + Math.random() * 2;
                this.speedX = (Math.random() - 0.5) * 0.15;
                this.speedY = (Math.random() - 0.5) * 0.15;
                this.opacity = 0.1 + Math.random() * 0.3;
                this.color = `rgba(77, 163, 255, ${this.opacity})`;
            }
            update() {
                this.x += this.speedX;
                this.y += this.speedY;

                if(this.x < 0) this.x = width;
                else if(this.x > width) this.x = 0;
                if(this.y < 0) this.y = height;
                else if(this.y > height) this.y = 0;
            }
            draw() {
                ctx.beginPath();
                ctx.fillStyle = this.color;
                ctx.shadowColor = 'rgba(77,163,255,0.8)';
                ctx.shadowBlur = 4;
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        function init() {
            for(let i = 0; i < particleCount; i++) {
                particles.push(new Particle());
            }
        }

        function animate() {
            ctx.clearRect(0, 0, width, height);
            particles.forEach(p => {
                p.update();
                p.draw();
            });
            requestAnimationFrame(animate);
        }

        window.addEventListener('resize', () => {
            resize();
        });

        resize();
        init();
        animate();
    })();
    </script>
</body>
</html>

// Exakt dein vorgegebener Mailtext (mit IP, Port und Grund eingefügt)
$mail_body = "Ich kann auf die Seite: ({$server_ip}:{$server_port}) aus dem Grund: ({$reason}) nicht zugreifen!%0A%0A"
    ."Ich bestätige, dass ich diese Email nicht bearbeitet habe. Unser Team wird dies prüfen!%0A%0A"
    ."Hier unterschreiben: ";

$mail_link = "mailto:support@bedmine.de?subject=Zugriff%20gesperrt&body=" . $mail_body;
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>xHost | Zugriff Gesperrt</title>
    <style>
        html, body {
            margin: 0; padding: 0; height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a1a2f, #102a4d);
            color: #fff;
            overflow: hidden;
            position: relative;
        }

        /* Canvas Fullscreen über allem, aber unter Container */
        #particle-canvas {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: 0;
            pointer-events: none;
        }

        .container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(8px);
            padding: 40px;
            border-radius: 15px;
            max-width: 500px;
            text-align: center;
            box-shadow: 0 0 20px rgba(0,0,0,0.4);
            position: relative;
            z-index: 1;
            margin: auto;
            top: 50%;
            transform: translateY(-50%);
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 10px;
            color: #4da3ff;
        }

        p {
            font-size: 1rem;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .reason {
            background: rgba(255, 255, 255, 0.1);
            padding: 10px;
            border-radius: 8px;
            font-weight: bold;
            color: #ff6b6b;
            margin-bottom: 20px;
        }

        a.button {
            display: inline-block;
            padding: 12px 25px;
            background: #4da3ff;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        a.button:hover {
            background: #1d75cc;
        }

        footer {
            font-size: 0.8rem;
            margin-top: 15px;
            color: rgba(255,255,255,0.6);
        }
    </style>
</head>
<body>
    <canvas id="particle-canvas"></canvas>
    <div class="container">
        <h1>🚫 Zugriff Gesperrt</h1>
        <p>Der Zugriff auf diese Website wurde von <strong>xHost</strong> blockiert.</p>
        <div class="reason">
            Grund: <?php echo $reason; ?>
        </div>
        <p>Falls du glaubst, dass dies ein Irrtum ist, kontaktiere bitte unseren Support.</p>
        <a href="<?php echo $mail_link; ?>" class="button">Support Kontaktieren</a>
        <footer>
            &copy; <?php echo date('Y'); ?> xʜᴏꜱᴛ ꜱᴛᴜᴅɪᴏꜱ
        </footer>
    </div>

    <script>
    (() => {
        const canvas = document.getElementById('particle-canvas');
        const ctx = canvas.getContext('2d');
        let width, height;

        const particles = [];
        const particleCount = 80;

        function resize() {
            width = window.innerWidth;
            height = window.innerHeight;
            canvas.width = width * devicePixelRatio;
            canvas.height = height * devicePixelRatio;
            canvas.style.width = width + 'px';
            canvas.style.height = height + 'px';
            ctx.setTransform(1,0,0,1,0,0);
            ctx.scale(devicePixelRatio, devicePixelRatio);
        }

        class Particle {
            constructor() {
                this.reset();
            }
            reset() {
                this.x = Math.random() * width;
                this.y = Math.random() * height;
                this.size = 1 + Math.random() * 2;
                this.speedX = (Math.random() - 0.5) * 0.15;
                this.speedY = (Math.random() - 0.5) * 0.15;
                this.opacity = 0.1 + Math.random() * 0.3;
                this.color = `rgba(77, 163, 255, ${this.opacity})`;
            }
            update() {
                this.x += this.speedX;
                this.y += this.speedY;

                if(this.x < 0) this.x = width;
                else if(this.x > width) this.x = 0;
                if(this.y < 0) this.y = height;
                else if(this.y > height) this.y = 0;
            }
            draw() {
                ctx.beginPath();
                ctx.fillStyle = this.color;
                ctx.shadowColor = 'rgba(77,163,255,0.8)';
                ctx.shadowBlur = 4;
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        function init() {
            for(let i = 0; i < particleCount; i++) {
                particles.push(new Particle());
            }
        }

        function animate() {
            ctx.clearRect(0, 0, width, height);
            particles.forEach(p => {
                p.update();
                p.draw();
            });
            requestAnimationFrame(animate);
        }

        window.addEventListener('resize', () => {
            resize();
        });

        resize();
        init();
        animate();
    })();
    </script>
</body>
</html>

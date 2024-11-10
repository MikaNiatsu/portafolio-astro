<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora IPv4</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        header, footer {
            background-color: #1E40AF;
            color: white;
            padding: 1rem;
            text-align: center;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1;
        }

        footer {
            margin-top: auto;
        }

        .bubble-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }

        .bubble {
            position: absolute;
            border-radius: 50%;
            opacity: 0;
            background: rgba(50, 100, 250, 0.5);
            animation: float 15s infinite ease-in-out;
        }

        @keyframes float {
            0% {
                transform: translate(0, 100vh) rotate(0deg);
                opacity: 0;
            }
            20% {
                opacity: 0.6;
            }
            80% {
                opacity: 0.6;
            }
            100% {
                transform: translate(var(--moveX), -100vh) rotate(360deg);
                opacity: 0;
            }
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-100 font-sans overflow-hidden relative">

    <div class="bubble-container"></div>

    <header class="bg-blue-800 text-white p-8 text-center rounded-b-lg shadow-md z-10 relative">
        <h1 class="text-3xl font-bold">Calculadora IPv4</h1>
    </header>

    <main class="flex-1 flex flex-col items-center justify-center p-4 z-10 relative">
        <?php
        session_start();
        if (isset($_GET['submit'])) {
            $ip_parts = explode('.', $_GET['ip-address']);
            $mask_parts = isset($_GET['check']) ? array() : explode('.', $_GET['mask-address']);

            if (isset($_GET['check'])) {
                if (!empty($_GET['ip-address']) && !empty($_GET['cidr'])) {
                    header("Location: resultado.php?ip={$_GET['ip-address']}&cidr={$_GET['cidr']}");
                } else {
                    echo '<div class="bg-red-600 text-white p-4 rounded-lg text-center mt-4 mb-4">Faltan datos</div>';
                }
            } else {
                if (!empty($_GET['ip-address']) && !empty($_GET['mask-address'])) {
                    header("Location: resultado.php?ip={$_GET['ip-address']}&mask={$_GET['mask-address']}");
                } else {
                    echo '<div class="bg-red-600 text-white p-4 rounded-lg text-center mt-4 mb-4">Faltan datos</div>';
                }
            }
        }
        ?>

        <form method="get" class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg z-10">
            <div class="mb-4">
                <label for="ip-address" class="block text-lg font-medium text-gray-700">Dirección IP:</label>
                <input type="text"
                    name="ip-address"
                    id="ip-address"
                    class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Ej: 192.168.1.1"
                    pattern="^(\d{1,3}\.){3}\d{1,3}$"
                    title="Formato: xxx.xxx.xxx.xxx (0-255 por octeto)"
                    value="<?php echo isset($_GET['ip-address']) ? htmlspecialchars($_GET['ip-address']) : ''; ?>">
            </div>

            <div class="mb-4">
                <label for="mask-address" class="block text-lg font-medium text-gray-700">Máscara de red:</label>
                <input type="text"
                    name="mask-address"
                    id="mask-address"
                    class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Ej: 255.255.255.0"
                    pattern="^(\d{1,3}\.){3}\d{1,3}$"
                    title="Formato: xxx.xxx.xxx.xxx (0-255 por octeto)"
                    value="<?php echo isset($_GET['mask-address']) ? htmlspecialchars($_GET['mask-address']) : ''; ?>">

                <input type="number"
                    name="cidr"
                    id="cidr"
                    class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Ej: 24"
                    min="0"
                    max="30"
                    style="display: none;"
                    value="<?php echo isset($_GET['cidr']) ? htmlspecialchars($_GET['cidr']) : ''; ?>">
            </div>

            <div class="flex items-center mb-4">
                <input type="checkbox" name="check" id="cidr-check" <?php echo isset($_GET['check']) ? 'checked' : ''; ?> class="mr-2">
                <label for="cidr-check" class="text-lg text-gray-700">Usar notación CIDR</label>
            </div>

            <input type="submit" name="submit" value="Calcular" class="w-full p-3 bg-blue-600 text-white font-semibold rounded-lg cursor-pointer hover:bg-blue-700">
        </form>
    </main>

    <footer class="bg-blue-800 text-white p-4 text-center mt-auto rounded-t-lg shadow-md z-10 relative">
        <p>&copy; Miguel Linares Universidad El Bosque</p>
    </footer>

    <script>
        document.getElementById('cidr-check').addEventListener('change', function() {
            const maskInput = document.getElementById('mask-address');
            const cidrInput = document.getElementById('cidr');

            if (this.checked) {
                maskInput.style.display = 'none';
                cidrInput.style.display = 'block';
            } else {
                maskInput.style.display = 'block';
                cidrInput.style.display = 'none';
            }
        });

        if (document.getElementById('cidr-check').checked) {
            document.getElementById('mask-address').style.display = 'none';
            document.getElementById('cidr').style.display = 'block';
        }
    </script>
    <script>
        function createBubble() {
            const bubble = document.createElement('div');
            bubble.className = 'bubble';

            // Tamaño aleatorio entre 30px y 120px
            const size = Math.random() * 90 + 30;
            bubble.style.width = `${size}px`;
            bubble.style.height = `${size}px`;

            // Posición inicial aleatoria en el eje X
            const startX = Math.random() * 100;
            bubble.style.left = `${startX}%`;

            // Movimiento aleatorio en X durante la animación
            const moveX = (Math.random() - 0.5) * 200;
            bubble.style.setProperty('--moveX', `${moveX}px`);

            // Duración aleatoria de la animación
            const duration = Math.random() * 5 + 10;
            bubble.style.animationDuration = `${duration}s`;

            // Retraso aleatorio inicial
            const delay = Math.random() * 5;
            bubble.style.animationDelay = `${delay}s`;

            document.querySelector('.bubble-container').appendChild(bubble);

            // Eliminar la burbuja después de que termine la animación
            setTimeout(() => {
                bubble.remove();
                createBubble(); // Crear una nueva burbuja para mantener el efecto continuo
            }, (duration + delay) * 1000);
        }

        // Crear burbujas iniciales
        for (let i = 0; i < 15; i++) {
            createBubble();
        }
    </script>
</body>

</html>
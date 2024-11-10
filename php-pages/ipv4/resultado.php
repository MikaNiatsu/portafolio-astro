<?php
require("php/ipv4.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
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

        header,
        footer {
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

        .table-container {
            width: 100%;
            overflow-x: auto;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .center-div {
            text-align: center;
            margin: 2rem 0;
        }

        .table-container {
            width: 80%;
            /* Reducido el ancho */
            max-width: 900px;
            /* Ancho máximo */
            overflow-x: auto;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin: 0 auto;
            /* Centrado */
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        th,
        td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover {
            background-color: #f0f0f0;
            transition: background-color 0.3s ease-in-out;
        }

        th:hover,
        td:hover {
            background-color: #d1eaff;
            transition: background-color 0.3s ease-in-out;
        }

        tr:hover td,
        tr:hover th {
            background-color: #d1eaff;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }

        @media (max-width: 768px) {

            th,
            td {
                padding: 0.75rem;
            }
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-100 relative">

    <div class="bubble-container"></div>


    <header class="z-10 relative">
        <h1 class="text-2xl font-bold text-white">Resultado de la Calculadora IPv4</h1>
    </header>

    <main class="flex-1 flex flex-col items-center justify-center p-4 z-10 relative">
        <?php
        try {
            if (isset($_GET['ip']) && (isset($_GET['mask']) || isset($_GET['cidr']))) {
                echo '<div class="text-center mb-6"> <h2 class="text-xl font-semibold">Resultado</h2> </div>';
                $ip = htmlentities($_GET['ip']);
                $maskOrCidr = isset($_GET['mask']) ? htmlentities($_GET['mask']) : htmlentities($_GET['cidr']);
                $resultado = new IPv4Calculator($ip, $maskOrCidr);

                echo "<div class='table-container'>";
                echo "<table class='table-auto'>";
                echo "<tr class='bg-blue-100 text-blue-800'><th>Propiedad</th><th>Valor</th></tr>";

                foreach ($resultado->getInfo() as $key => $value) {
                    echo "<tr class='hover:bg-gray-100'>";
                    echo "<td class='px-4 py-2'>" . $key . "</td>";
                    echo "<td class='px-4 py-2'>" . $value . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
                echo '<div class="text-center mt-6"><a href="index.php" class="p-2 bg-blue-600 text-white font-semibold rounded-lg">Volver</a></div>';
            } else {
                echo '<div class="bg-red-600 text-white p-4 rounded-lg text-center mt-4">Faltan datos</div>';
                echo '<div class="text-center mt-6"><a href="index.php" class="p-2 bg-blue-600 text-white font-semibold rounded-lg">Volver</a></div>';
            }
        } catch (Exception $e) {
            echo '<div class="bg-red-600 text-white p-4 rounded-lg text-center mt-4">' . $e->getMessage() . '</div>';
            echo '<div class="text-center mt-6"><a href="index.php" class="p-2 bg-blue-600 text-white font-semibold rounded-lg">Volver</a></div>';
        }
        ?>
    </main>

    <footer>
        <p>&copy; Miguel Linares Universidad El Bosque</p>
    </footer>
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
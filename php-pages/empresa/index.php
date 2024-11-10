<?php
$PLACE_HOLDER = 'https://www.mirringo.com.co/Portals/mirringo/Images/articulos-actualidad-gatuna/ciclo-de-vida-de-los-gatos/Interna-1-ciclo-de-vida-de-los-gatos.jpg?ver=2024-03-20-160432-910';
$empresa = [
    'nombre' => 'Technosymphony S.A.',
    'slogan' => 'Armonizando tu negocio con la tecnologiá',
    'historia' => [
        ['año' => '2010', 'evento' => 'Fundación de Technosymphony S.A. como líder en integración de soluciones tecnológicas innovadoras.'],
        ['año' => '2010-2015', 'evento' => 'Desarrollo de una cultura de excelencia y expansión del portafolio de servicios.'],
        ['año' => '2015-2020', 'evento' => 'Consolidación como socio estratégico para organizaciones de todos los sectores en más de 20 países.'],
        ['año' => 'Hoy', 'evento' => 'Continua evolución y adaptación a tendencias emergentes, preparándose para los desafíos del futuro.'],
    ],
    'mision' => 'Nuestra misión es ser un referente en el mundo de la consultoría TI, orquestando soluciones que armonizan tecnología y negocio.',
    'vision' => 'Ser reconocidos globalmente como el socio tecnológico preferido para la transformación digital y la innovación empresarial.',
    'servicios' => [
        ['nombre' => 'Consultoría', 'descripcion' => 'Análisis y mejora de procesos, implementación de tecnologías y automatización de tareas.'],
        ['nombre' => 'Desarrollo de software', 'descripcion' => 'Creación de software personalizado o a medida, según las necesidades de tu empresa.'],
        ['nombre' => 'Ciberseguridad', 'descripcion' => 'Análisis de vulnerabilidades, implementación de seguridad en redes y protección de datos.'],
        ['nombre' => 'Audioria', 'descripcion' => 'Análisis de la seguridad de la información y definición de políticas de seguridad.'],
    ],
    'equipo' => [
        ['nombre' => 'Sebastian Vega Baquero', 'cargo' => 'Desarrollador', 'imagen' => $PLACE_HOLDER],
        ['nombre' => 'Juan Esteban Oyola Galindo', 'cargo' => 'CTO', 'imagen' => $PLACE_HOLDER],
        ['nombre' => 'Johan Felipe Silva Cavieles', 'cargo' => 'CEO', 'imagen' => $PLACE_HOLDER],
        ['nombre' => 'Miguel Angel Linares Saenz', 'cargo' => 'Líder de Desarrollo', 'imagen' => $PLACE_HOLDER],
        ['nombre' => 'David Torres Lara', 'cargo' => 'Desarrollador', 'imagen' => $PLACE_HOLDER],
    ],
    'telefono' => '+57 (608) 2082929',
    'email' => '2lO3m@example.com',
    'direccion' => 'Calle 51C # 29-17 Sur',
    'NIT' => '123456789',
    'acerca' => 'En Technosymphony S.A., combinamos tecnología y estrategia para ayudar a las empresas a alcanzar su máximo potencial en la era digital. Desde 2010, hemos sido un socio confiable en la transformación digital, ofreciendo soluciones innovadoras que impulsan la eficiencia y el crecimiento sostenible. Nuestra pasión por la excelencia y el enfoque en el cliente nos distingue como líderes en consultoría TI a nivel global.',
];
?>

<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $empresa['nombre']; ?></title>
    <link rel="icon" href="public/Logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        naranja: '#FF6600',
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideInLeft {
            from { transform: translateX(-100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes scaleIn {
            from { transform: scale(0.5); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        .animate-fadeIn {
            animation: fadeIn 1s ease-out;
        }
        .animate-slideInLeft {
            animation: slideInLeft 1s ease-out;
        }
        .animate-slideInRight {
            animation: slideInRight 1s ease-out;
        }
        .animate-scaleIn {
            animation: scaleIn 0.5s ease-out;
        }
        .timeline-container::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: #FF6600;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }
        .timeline-item {
            padding: 10px 40px;
            position: relative;
            background-color: inherit;
            width: 50%;
        }
        .timeline-item::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            right: -17px;
            background-color: #FF6600;
            border: 4px solid #FF6600;
            top: 15px;
            border-radius: 50%;
            z-index: 1;
            transition: all 0.3s ease;
        }
        .timeline-item:hover::after {
            transform: scale(1.2);
            box-shadow: 0 0 15px #FF6600;
        }
        .left {
            left: 0;
        }
        .right {
            left: 50%;
        }
        .left::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            right: 30px;
            border: medium solid #FF6600;
            border-width: 10px 0 10px 10px;
            border-color: transparent transparent transparent #FF6600;
        }
        .right::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            left: 30px;
            border: medium solid #FF6600;
            border-width: 10px 10px 10px 0;
            border-color: transparent #FF6600 transparent transparent;
        }
        .right::after {
            left: -16px;
        }
        .timeline-content {
            transition: all 0.3s ease;
        }
        .timeline-item:hover .timeline-content {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        @media screen and (max-width: 600px) {
            .timeline-container::after {
                left: 31px;
            }
            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }
            .timeline-item::before {
                left: 60px;
                border: medium solid #FF6600;
                border-width: 10px 10px 10px 0;
                border-color: transparent #FF6600 transparent transparent;
            }
            .left::after, .right::after {
                left: 15px;
            }
            .right {
                left: 0%;
            }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .animate-fadeIn {
            animation: fadeIn 1s ease-out;
        }
        .bg-image {
            background-image: url('public/fondo.png'); /* Reemplaza con la URL de tu imagen */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .bg-overlay {
            background-color: rgba(0, 0, 0, 0.6); /* Ajusta la opacidad aquí */
        }
    </style>
</head>
<body class="bg-gray-900 text-white">
    <!-- Barra de navegación -->
    <nav class="bg-gray-800 fixed w-full z-10">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="#" class="text-naranja text-xl font-bold"><?php echo $empresa['nombre']; ?></a>
                <div class="hidden md:flex space-x-4">
                    <a href="#inicio" class="hover:text-naranja transition duration-300">Inicio</a>
                    <a href="#quienes-somos" class="hover:text-naranja transition duration-300">Quiénes Somos</a>
                    <a href="#equipo" class="hover:text-naranja transition duration-300">Equipo</a>
                    <a href="#servicios" class="hover:text-naranja transition duration-300">Servicios</a>
                    <a href="#contacto" class="hover:text-naranja transition duration-300">Contacto</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sección de inicio -->
    <section id="inicio" class="min-h-screen flex items-center justify-center text-center bg-image relative">
        <div class="absolute inset-0 bg-overlay backdrop-filter backdrop-blur-sm"></div>
        <div class="container mx-auto px-4 animate-fadeIn relative z-10">
            <h1 class="text-5xl font-bold mb-4 text-white"><?php echo $empresa['nombre']; ?></h1>
            <p class="text-xl text-naranja"><?php echo $empresa['slogan']; ?></p>
        </div>
    </section>

    <!-- Sección Quiénes Somos -->
    <section id="quienes-somos" class="py-20 bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-10 text-center">Nuestra Historia</h2>
            <div class="timeline-container relative">
                <?php foreach ($empresa['historia'] as $index => $hito): ?>
                    <div class="timeline-item <?php echo $index % 2 == 0 ? 'left' : 'right'; ?> mb-8">
                        <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
                            <h3 class="text-xl font-semibold mb-2 text-naranja"><?php echo $hito['año']; ?></h3>
                            <p><?php echo $hito['evento']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="mt-16 grid md:grid-cols-2 gap-10">
                <div class="animate-fadeIn">
                    <h3 class="text-2xl font-semibold mb-4 text-naranja">Misión</h3>
                    <p><?php echo $empresa['mision']; ?></p>
                </div>
                <div class="animate-fadeIn" style="animation-delay: 0.3s;">
                    <h3 class="text-2xl font-semibold mb-4 text-naranja">Visión</h3>
                    <p><?php echo $empresa['vision']; ?></p>
                </div>
            </div>
        </div>
    </section> 

    <!-- Sección del Equipo con Carrusel -->
    <section id="equipo" class="py-20">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-10 text-center">Nuestro Equipo</h2>
            <div class="relative max-w-2xl mx-auto">
                <div id="carousel" class="overflow-hidden">
                    <div id="carouselInner" class="flex transition-transform duration-300 ease-in-out">
                        <?php foreach ($empresa['equipo'] as $miembro): ?>
                            <div class="w-full flex-shrink-0 text-center">
                                <img src="<?php echo $miembro['imagen']; ?>" alt="<?php echo $miembro['nombre']; ?>" class="w-48 h-48 mx-auto rounded-full mb-4">
                                <h3 class="text-xl font-semibold text-naranja"><?php echo $miembro['nombre']; ?></h3>
                                <p><?php echo $miembro['cargo']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button id="prevBtn" class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-naranja text-white p-2 rounded-full">&#10094;</button>
                <button id="nextBtn" class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-naranja text-white p-2 rounded-full">&#10095;</button>
            </div>
        </div>
    </section>

    <!-- Sección de Servicios -->
    <section id="servicios" class="py-20 bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-10 text-center">Nuestros Servicios</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($empresa['servicios'] as $index => $servicio): ?>
                    <div class="bg-gray-700 p-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300 animate-fadeIn" style="animation-delay: <?php echo $index * 0.2; ?>s;">
                        <h3 class="text-xl font-semibold mb-4 text-naranja"><?php echo $servicio['nombre']; ?></h3>
                        <p><?php echo $servicio['descripcion']; ?>.</p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Sección de Contacto -->
    <section id="contacto" class="py-20">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-10 text-center">Contacto</h2>
            <div class="max-w-md mx-auto">
                <form class="space-y-4">
                    <div>
                        <label for="nombre" class="block mb-2">Nombre</label>
                        <input type="text" id="nombre" class="w-full p-2 bg-gray-700 rounded" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2">Email</label>
                        <input type="email" id="email" class="w-full p-2 bg-gray-700 rounded" required>
                    </div>
                    <div>
                        <label for="mensaje" class="block mb-2">Mensaje</label>
                        <textarea id="mensaje" rows="4" class="w-full p-2 bg-gray-700 rounded" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-naranja text-white py-2 px-4 rounded hover:bg-orange-700 transition duration-300">Enviar</button>
                </form>
            </div>
        </div>
    </section>

    <footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="text-center">
                <p class="text-lg font-semibold mb-2">Contacto</p>
                <p class="flex items-center justify-center mb-2">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    <?php echo $empresa['direccion']; ?>
                </p>
                <p class="flex items-center justify-center mb-2">
                    <i class="fas fa-phone mr-2"></i>
                    <?php echo $empresa['telefono']; ?>
                </p>
                <p class="flex items-center justify-center">
                    <i class="fas fa-envelope mr-2"></i>
                    <?php echo $empresa['email']; ?>
                </p>
            </div>
            <div class="text-center md:text-left md:col-span-2">
                <p class="text-lg font-semibold mb-2">Acerca de Nosotros</p>
                <p><?php echo $empresa['acerca']; ?></p>
            </div>
            <div class="text-center">
                <p class="text-lg font-semibold mb-2">Síguenos</p>
                <div class="flex justify-center">
                    <a href="#" class="text-white hover:text-gray-300 mx-2">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-white hover:text-gray-300 mx-2">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-white hover:text-gray-300 mx-2">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-700">
        <p>&copy; 2024 <?php echo $empresa['nombre']; ?> Todos los derechos reservados.</p>
    </div>
</footer>


    <script>
        
        function revelar() {
            var revelaciones = document.querySelectorAll(".animate-fadeIn, .timeline-item, .animate-scaleIn");
            for (var i = 0; i < revelaciones.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = revelaciones[i].getBoundingClientRect().top;
                var elementVisible = 150;
                if (elementTop < windowHeight - elementVisible) {
                    revelaciones[i].classList.add("opacity-100");
                    if (revelaciones[i].classList.contains('timeline-item')) {
                        revelaciones[i].classList.add(i % 2 === 0 ? "animate-slideInLeft" : "animate-slideInRight");
                    }
                } else {
                    revelaciones[i].classList.remove("opacity-100");
                }
            }
        }

        window.addEventListener("scroll", revelar);
        window.addEventListener("load", revelar);
        revelar(); // Para elementos visibles al cargar la página

        // Animación suave para los enlaces de navegación
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        revelar(); // Para elementos visibles al cargar la página

        // Carrusel
        const carousel = document.getElementById('carousel');
        const carouselInner = document.getElementById('carouselInner');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const slides = carouselInner.children;
        let currentIndex = 0;

        function showSlide(index) {
            carouselInner.style.transform = `translateX(-${index * 100}%)`;
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(currentIndex);
        }

        nextBtn.addEventListener('click', nextSlide);
        prevBtn.addEventListener('click', prevSlide);

        // Cambio automático de diapositivas cada 5 segundos
        setInterval(nextSlide, 5000);
    </script>
</body>
</html>
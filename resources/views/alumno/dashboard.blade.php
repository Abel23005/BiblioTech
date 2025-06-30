<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard de Alumno') }}
        </h2>
    </x-slot>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <div class="py-5 bg-light min-vh-100">
        <div class="container">
            <!-- Logo Section -->
            <div class="row justify-content-center mb-4">
                <div class="col-lg-8 text-center">
                    <img src="{{ asset('images/Logo de Biblotech.png') }}" alt="BiblioTech Logo" class="img-fluid" style="max-height: 120px; margin-bottom: 20px;">
                    <h3 class="text-primary fw-bold">Biblioteca Virtual Estudiantil</h3>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-lg border-0 rounded-lg mb-5">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <h1 class="display-5 fw-bold text-primary">Bienvenido a tu Biblioteca Virtual</h1>
                                <h2 class="h4 text-secondary mb-4">{{ auth()->user()->universidad->name ?? '' }}</h2>
                            </div>
                            <!-- Aquí puedes agregar más contenido con clases de Bootstrap -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    .hero-section {
        height: 60vh;
        background-image: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
        position: relative;
        z-index: 1;
        padding: 2rem;
    }

    .card {
        border: none;
        border-radius: 15px;
        transition: transform 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    @media (max-width: 768px) {
        .hero-section {
            height: 40vh;
        }
        
        .hero-content h1 {
            font-size: 2rem;
        }
    }
    </style>

    @php
        $uni = auth()->user()->universidad->name ?? '';
        $info = [
            'TECSUP' => [
                'historia' => 'TECSUP es reconocida como una de las instituciones líderes en educación tecnológica en el Perú. Desde su fundación, ha sido un referente en la formación de profesionales altamente capacitados, comprometidos con la innovación, la excelencia académica y el desarrollo sostenible del país.<br><br>
                A lo largo de los años, TECSUP ha construido una sólida reputación gracias a su enfoque práctico, su vínculo estrecho con la industria y su compromiso con la calidad educativa. No solo ofrece programas técnicos y profesionales de alto nivel, sino que también promueve una cultura de aprendizaje continuo, investigación aplicada y emprendimiento tecnológico.<br><br>
                Sus modernas instalaciones, equipadas con tecnología de punta, y un equipo docente con amplia experiencia, permiten que los estudiantes desarrollen competencias que responden a las exigencias del mercado laboral actual. TECSUP no solo forma técnicos e ingenieros, forma líderes capaces de transformar su entorno a través del conocimiento y la innovación.<br><br>
                Estudiar en TECSUP es más que una decisión académica: es una apuesta por el futuro, por la excelencia, y por un Perú más competitivo e inclusivo. Aquí no solo se adquieren conocimientos, se construyen proyectos de vida.',
                'mensaje' => 'En TECSUP, los libros son la puerta a la tecnología y la transformación. ¡Tú eres parte de la nueva generación de pioneros que cambiarán el mundo con conocimiento y pasión!'
            ],
            'UTP' => [
                'historia' => 'La Universidad Tecnológica del Perú (UTP) destaca por su enfoque práctico y su compromiso con la excelencia académica. Sus egresados son reconocidos por su capacidad de liderazgo y emprendimiento.',
                'mensaje' => 'En la UTP, cada libro es una herramienta para construir tu futuro. Aprovecha el poder de la educación y conviértete en el profesional que siempre soñaste ser.'
            ],
            'UPN' => [
                'historia' => 'La Universidad Privada del Norte (UPN) es pionera en la formación integral de sus estudiantes, promoviendo valores, innovación y responsabilidad social.',
                'mensaje' => 'En la UPN, los libros te conectan con ideas que transforman vidas. Sé protagonista de tu historia y deja huella en el mundo.'
            ],
            'UPC' => [
                'historia' => 'La Universidad Peruana de Ciencias Aplicadas (UPC) es reconocida por su visión global y su apuesta por la creatividad y la investigación.',
                'mensaje' => 'En la UPC, el conocimiento es tu mayor poder. Atrévete a soñar en grande y usa los libros como escalera hacia tus metas.'
            ],
        ];
    @endphp

    <div class="container mt-10 mb-10">
        <div class="bg-white rounded-lg shadow p-8 max-w-2xl mx-auto text-center">
            <h2 class="text-2xl font-bold mb-4 text-primary-header">Tu Universidad: {{ $uni }}</h2>
            <p class="text-lg mb-4 text-gray-700">{{ $info[$uni]['historia'] ?? 'Eres parte de una universidad que apuesta por el futuro y la excelencia.' }}</p>
            <div class="bg-cta text-white rounded-lg p-4 mb-2 font-semibold">
                {{ $info[$uni]['mensaje'] ?? 'Recuerda: los libros y el aprendizaje son la clave para abrir todas las puertas de tu vida profesional y personal.' }}
            </div>
        </div>
    </div>
</x-app-layout> 
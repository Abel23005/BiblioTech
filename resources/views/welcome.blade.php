<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            height: 100vh;
            margin: 0;
            overflow-x: hidden;
        }
        
        .welcome-container {
            min-height: calc(100vh - 60px);
            display: flex;
            align-items: stretch;
            background-color: #ffffff;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
        }
        
        .image-section {
            flex: 1;
            position: relative;
            overflow: hidden;
            border-radius: 0 20px 20px 0;
        }
        
        .book-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.85);
            transition: transform 0.3s ease;
        }
        
        .content-section {
            flex: 1;
            padding: 4rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .logo-title {
            font-size: 3.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
            background: linear-gradient(45deg, #2c3e50, #3498db);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .welcome-title {
            font-size: 2rem;
            color: #34495e;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }
        
        .description {
            color: #7f8c8d;
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 3rem;
            max-width: 500px;
        }
        
        .buttons-container {
            display: flex;
            gap: 1rem;
        }
        
        .btn {
            padding: 0.8rem 2rem;
            font-weight: 500;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background: linear-gradient(45deg, #3498db, #2980b9);
            border: none;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
            background: linear-gradient(45deg, #2980b9, #2573a7);
        }
        
        .btn-secondary {
            background: #ffffff;
            color: #2c3e50;
            border: 2px solid #e0e6ed;
        }
        
        .btn-secondary:hover {
            background: #f8f9fa;
            border-color: #cbd5e1;
            transform: translateY(-2px);
        }
        
        footer {
            text-align: center;
            padding: 1rem;
            background-color: white;
            color: #95a5a6;
            font-size: 0.9rem;
            border-top: 1px solid #f1f1f1;
        }

        @media (max-width: 992px) {
            .welcome-container {
                flex-direction: column-reverse;
            }
            
            .image-section {
                height: 300px;
                border-radius: 20px 20px 0 0;
            }
            
            .content-section {
                padding: 3rem 2rem;
                text-align: center;
            }
            
            .description {
                margin-left: auto;
                margin-right: auto;
            }
            
            .buttons-container {
                justify-content: center;
            }
            
            .logo-title {
                font-size: 2.8rem;
            }
            
            .welcome-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <div class="content-section">
            <h1 class="logo-title">BiblioTech</h1>
            <h2 class="welcome-title">Bienvenido a BiblioTech</h2>
            <p class="description">
                Sistema de Gestión de Biblioteca Digital pensado para ti. 
                Administra libros, usuarios y préstamos de forma sencilla y eficiente.
            </p>
            <div class="buttons-container">
                <a href="{{ route('login') }}" class="btn btn-primary">Ingresar</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">Registrarse</a>
            </div>
        </div>
        <div class="image-section">
            <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?w=800&q=80" 
                 alt="Biblioteca" 
                 class="book-image">
        </div>
    </div>
    
    <footer>
        &copy; {{ date('Y') }} BiblioTech - Todos los derechos reservados
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>BiblioTech - Sistema de Gestión de Biblioteca Digital</title>
</head>
<body>

  <div class="container">
    <div class="left-side"></div>

    <div class="right-side">
      <div class="logo">BiblioTech</div>
      <h1>Bienvenido a BiblioTech</h1>
      <p>Sistema de Gestión de Biblioteca Digital pensado para ti. Administra libros, usuarios y préstamos de forma sencilla y eficiente.</p>
      <div class="btn-group">
        <a href="{{ url('/login') }}" class="btn btn-primary">Ingresar</a>
        <a href="{{ url('/register') }}" class="btn btn-secondary">Registrarse</a>
      </div>
    </div>
  </div>

  <footer>
    &copy; 2025 BiblioTech - Todos los derechos reservados
  </footer>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');

    * {
      margin: 0; 
      padding: 0; 
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      font-family: 'Inter', sans-serif;
      background: #f5f7fa;
      color: #222;
      position: relative;
      min-height: 100vh;
    }

    .container {
      display: flex;
      height: 100vh;
      overflow: hidden;
    }

    .left-side {
      flex: 1;
      background: url('https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=800&q=80') no-repeat center center/cover;
      position: relative;
    }

    .left-side::after {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0,0,0,0.35);
      z-index: 0;
    }

    .right-side {
      flex: 1;
      background: #ffffff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 4rem 3rem;
      box-shadow: -8px 0 30px rgba(0,0,0,0.1);
    }

    .logo {
      font-weight: 700;
      font-size: 2.8rem;
      color: #2c3e50;
      margin-bottom: 2rem;
      letter-spacing: 2px;
      user-select: none;
    }

    h1 {
      font-size: 3rem;
      color: #34495e;
      margin-bottom: 1rem;
    }

    p {
      font-size: 1.2rem;
      color: #7f8c8d;
      line-height: 1.6;
      margin-bottom: 3rem;
      max-width: 400px;
    }

    .btn-group {
      display: flex;
      gap: 1.6rem;
    }

    .btn {
      padding: 1rem 2.5rem;
      font-weight: 700;
      font-size: 1rem;
      border-radius: 35px;
      cursor: pointer;
      text-decoration: none;
      user-select: none;
      border: none;
      box-shadow: 0 4px 15px rgba(52, 73, 94, 0.15);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      transition: background-color 0.35s ease, box-shadow 0.35s ease, transform 0.25s ease;
      will-change: transform, box-shadow, background-color;
      outline-offset: 3px;
    }

    .btn-primary {
      background-color: #3498db;
      color: white;
      box-shadow: 0 6px 18px rgba(52, 152, 219, 0.4);
    }
    .btn-primary:hover,
    .btn-primary:focus {
      background-color: #2980b9;
      box-shadow: 0 10px 25px rgba(41, 128, 185, 0.6);
      transform: translateY(-4px);
      outline: none;
    }
    .btn-primary:active {
      transform: translateY(-1px);
      box-shadow: 0 6px 15px rgba(41, 128, 185, 0.5);
    }

    .btn-secondary {
      background-color: #bdc3c7;
      color: #2c3e50;
      border: 2px solid #bdc3c7;
      box-shadow: 0 4px 15px rgba(189, 195, 199, 0.4);
    }
    .btn-secondary:hover,
    .btn-secondary:focus {
      background-color: #7f8c8d;
      color: white;
      border-color: #7f8c8d;
      box-shadow: 0 10px 25px rgba(127, 140, 141, 0.6);
      transform: translateY(-4px);
      outline: none;
    }
    .btn-secondary:active {
      transform: translateY(-1px);
      box-shadow: 0 6px 15px rgba(127, 140, 141, 0.5);
    }

    footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      text-align: center;
      font-size: 0.9rem;
      color: #000000;
      font-weight: 500;
      background-color: #ffffff;
      padding: 12px 0;
      box-shadow: 0 -1px 5px rgba(0,0,0,0.1);
    }

    @media (max-width: 900px) {
      .container {
        flex-direction: column;
      }
      .left-side {
        height: 40vh;
        order: 2;
        background-position: center top;
      }
      .right-side {
        height: 60vh;
        box-shadow: none;
        padding: 3rem 2rem;
        order: 1;
      }
      p {
        max-width: 100%;
      }
      .btn-group {
        justify-content: center;
        flex-wrap: wrap;
      }
      .btn {
        width: 100%;
        max-width: 250px;
        text-align: center;
      }
    }
  </style>
</body>
</html>

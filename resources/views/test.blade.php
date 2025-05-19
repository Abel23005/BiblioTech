<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BiblioTech - Sistema de Gestión de Biblioteca Digital</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    :root {
      --primary: #0d6efd;
      --success: #10b981;
      --bg-light: #f8f9fa;
      --text-dark: #1f2937;
      --card-radius: 16px;
    }

    body {
      background-color: var(--bg-light);
      font-family: 'Segoe UI', sans-serif;
      color: var(--text-dark);
    }

    .main-logo {
      font-size: 2.5rem;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 1px;
      animation: fadeIn 1.2s ease-in-out;
    }

    .card {
      border-radius: var(--card-radius);
      overflow: hidden;
      border: none;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
      animation: slideUp 1s ease-in-out;
    }

    .card-header {
      background: linear-gradient(90deg, #0d6efd 0%, #2563eb 100%);
      color: white;
      padding: 2rem;
    }

    .card-body h4 {
      font-weight: 600;
    }

    .alert-success {
      display: flex;
      align-items: center;
      gap: 10px;
      background-color: #e6fffa;
      border-left: 5px solid var(--success);
    }

    .status-indicator {
      width: 14px;
      height: 14px;
      background-color: var(--success);
      border-radius: 50%;
      animation: pulse 1.5s infinite;
    }

    .card-title {
      font-weight: 600;
      color: #0d47a1;
    }

    .card-footer {
      background-color: #f1f5f9;
      font-size: 0.9rem;
      color: #6c757d;
      padding: 1rem;
    }

    .card-body .card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-body .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    @keyframes pulse {
      0% { transform: scale(1); opacity: 1; }
      50% { transform: scale(1.4); opacity: 0.6; }
      100% { transform: scale(1); opacity: 1; }
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow">
          <div class="card-header text-center">
            <h2 class="main-logo">📚 BiblioTech</h2>
            <p class="mb-0">Sistema de Gestión de Biblioteca Digital</p>
          </div>
          <div class="card-body">
            <h4 class="text-center mb-4">¡Instalación exitosa!</h4>
            <div class="alert alert-success">
              <span class="status-indicator"></span>
              <span class="lead">La aplicación está funcionando correctamente</span>
            </div>
            <p class="text-center">Esta es una vista de prueba que confirma que Laravel está listo para usarse.</p>
            <hr>
            <div class="row mt-4">
              <div class="col-md-6">
                <div class="card mb-3">
                  <div class="card-body">
                    <h5 class="card-title">Conexión a Base de Datos</h5>
                    <p class="card-text">✅ MySQL configurado correctamente</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card mb-3">
                  <div class="card-body">
                    <h5 class="card-title">Versión de Laravel</h5>
                    <p class="card-text">⚙️ Laravel 10.x instalado</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-center">
            <small>&copy; 2025 BiblioTech - Todos los derechos reservados</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

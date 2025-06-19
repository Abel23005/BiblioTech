# 📚 BiblioTech

Sistema de Gestión de Biblioteca Digital moderno y eficiente, diseñado para facilitar la administración de bibliotecas escolares y universitarias.

## 📷 Capturas de Pantalla

![Página de Bienvenida](https://i.imgur.com/example1.jpg)
*Página de bienvenida moderna y atractiva*

## 🚀 Características Principales

### Gestión de Usuarios
- Sistema de autenticación seguro
- Roles diferenciados (Administrador, Bibliotecario, Lector)
- Registro de usuarios con validación
- Perfiles personalizables

### Gestión de Libros
- Catálogo completo de libros
- Búsqueda avanzada por múltiples criterios
- Categorización y etiquetado
- Control de inventario

### Sistema de Préstamos
- Gestión de préstamos y devoluciones
- Sistema de reservas
- Notificaciones automáticas
- Historial de préstamos

### Panel de Administración
- Dashboard con estadísticas en tiempo real
- Reportes personalizados
- Gestión de multas y sanciones
- Configuración del sistema

### Características Adicionales
- Interfaz responsive
- Modo oscuro/claro
- Exportación de datos
- Sistema de backup

## 🛠️ Tecnologías Utilizadas

- **Framework Backend:** Laravel 10.x
- **Base de Datos:** MySQL
- **Frontend:** 
  - Bootstrap 5
  - JavaScript
  - Blade Templates
- **Autenticación:** Laravel Sanctum
- **Otros:** 
  - PHP 8.1+
  - Composer
  - Node.js & NPM

## ⚙️ Requisitos del Sistema

- PHP >= 8.1
- MySQL >= 5.7
- Composer
- Node.js >= 14.x
- NPM >= 6.x
- XAMPP (o similar con MySQL)

## 🚀 Guía de Instalación

### 1. Preparación del Entorno
Asegúrate de tener instalado:
- [XAMPP](https://www.apachefriends.org/es/download.html) (PHP 8.1 o superior)
- [Composer](https://getcomposer.org/download/)
- [Node.js](https://nodejs.org/)
- [Git](https://git-scm.com/downloads)

### 2. Clonar el Proyecto
```bash
# Crear carpeta para el proyecto
mkdir biblioteca_web
cd biblioteca_web

# Clonar el repositorio
git clone https://github.com/Abel23005/BiblioTech.git .
```

### 3. Configuración Inicial
```bash
# Instalar dependencias de PHP
composer install

# Instalar dependencias de Node.js
npm install

# Crear archivo de configuración
copy .env.example .env

# Generar clave de aplicación
php artisan key:generate
```

### 4. Configuración de Base de Datos
1. Abre XAMPP Control Panel
2. Inicia Apache y MySQL
3. Abre phpMyAdmin (http://localhost/phpmyadmin)
4. Crea una nueva base de datos llamada 'biblioteca_web'
5. Configura el archivo `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=biblioteca_web
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Finalizar Instalación
```bash
# Crear tablas en la base de datos
php artisan migrate

# Compilar assets
npm run dev

# Iniciar el servidor
php artisan serve
```

### 6. Acceder al Proyecto
Visita http://localhost:8000 en tu navegador

### ❗ Solución de Problemas Comunes

| Problema | Solución |
|----------|----------|
| Error de vendor/autoload.php | Ejecuta `composer install` |
| Página sin estilos | Ejecuta `npm install && npm run dev` |
| Error de base datos | Verifica que XAMPP esté corriendo |
| Error de .env | Copia `.env.example` a `.env` |
| Error de clave | Ejecuta `php artisan key:generate` |

## 📁 Estructura del Proyecto

```
BiblioTech/
├── app/                # Lógica principal de la aplicación
│   ├── Http/          # Controllers, Middleware, Requests
│   ├── Models/        # Modelos de la aplicación
│   └── Services/      # Servicios de la aplicación
├── config/            # Archivos de configuración
├── database/          # Migraciones y seeders
├── public/            # Archivos públicos
├── resources/         # Vistas, assets y traducciones
├── routes/            # Definición de rutas
└── tests/             # Tests automatizados
```

## 📦 Dependencias Principales

### PHP (Composer)
- laravel/framework: ^10.0
- laravel/sanctum: ^3.2
- laravel/tinker: ^2.8

### JavaScript (NPM)
- @vitejs/plugin-vue: ^4.0.0
- axios: ^1.1.2
- bootstrap: ^5.3.0
- vite: ^4.0.0

## 🧪 Pruebas

Para ejecutar las pruebas:

```bash
php artisan test
```

## 📄 Licencia

Este proyecto está bajo la Licencia MIT - ver el archivo [LICENSE.md](LICENSE.md) para más detalles.

## 👥 Equipo

- **Desarrollador Principal:** [Abel23005](https://github.com/Abel23005)
- **Diseñadores UI/UX:** 
  - [sebastianalva24AC](https://github.com/sebastianalva24AC)
  - [Abel23005](https://github.com/Abel23005)
  - [Daniellaln](https://github.com/Daniellaln)

## 🤝 Contribuir

Las contribuciones son bienvenidas. Por favor, lee [CONTRIBUTING.md](CONTRIBUTING.md) para detalles sobre nuestro código de conducta y el proceso para enviarnos pull requests.

## 📞 Soporte

Si tienes alguna pregunta o problema:
- Abre un issue en el repositorio
- Contacta al equipo: [imer.qusipe@tecsup.edu.pe](mailto:imer.qusipe@tecsup.edu.pe)

## 🎉 Agradecimientos

- Al profesor Gonzalo Chrisjacq Suarez Garcia
- A todos los contribuidores del proyecto
- A la comunidad de Laravel
- A los usuarios por sus comentarios y sugerencias

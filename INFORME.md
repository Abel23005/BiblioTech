# BiblioTech - Sistema de Gestión de Biblioteca Digital
## Segunda Entrega

### Portada
**Proyecto:** BiblioTech - Sistema de Gestión de Biblioteca Digital  
**Integrantes:**
- Abel Imer Quispe Quezada (Desarrollador Principal)
- Sebastian Alva (Diseñador UI/UX)
- Daniela Micaela Leon Andres (Diseñadora UI/UX)

**Fecha de entrega:** Marzo 2024

### 1. Introducción
BiblioTech es un sistema de gestión bibliotecaria moderno y eficiente, diseñado para facilitar la administración de bibliotecas escolares y universitarias. En esta segunda entrega, hemos implementado las funcionalidades CRUD básicas, el sistema de autenticación, y las relaciones entre modelos, creando una base sólida para el sistema.

### 2. Desarrollo Técnico

#### 2.1 Modelos, Migraciones y Seeders

##### Modelos Implementados:
1. **Usuario**
```php
class Usuario extends Model
{
    protected $fillable = [
        'nombre', 'email', 'password',
        'rol', 'estado'
    ];
    
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }
}
```

2. **Libro**
```php
class Libro extends Model
{
    protected $fillable = [
        'titulo', 'autor_id', 'categoria_id',
        'isbn', 'disponible'
    ];
    
    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
```

3. **Prestamo**
```php
class Prestamo extends Model
{
    protected $fillable = [
        'usuario_id', 'libro_id',
        'fecha_prestamo', 'fecha_devolucion'
    ];
    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
    
    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }
}
```

##### Migraciones:
```php
// usuarios
Schema::create('usuarios', function (Blueprint $table) {
    $table->id();
    $table->string('nombre');
    $table->string('email')->unique();
    $table->string('password');
    $table->enum('rol', ['admin', 'bibliotecario', 'lector']);
    $table->boolean('estado')->default(true);
    $table->timestamps();
});

// libros
Schema::create('libros', function (Blueprint $table) {
    $table->id();
    $table->string('titulo');
    $table->string('isbn')->unique();
    $table->foreignId('autor_id')->constrained();
    $table->foreignId('categoria_id')->constrained();
    $table->boolean('disponible')->default(true);
    $table->timestamps();
});

// prestamos
Schema::create('prestamos', function (Blueprint $table) {
    $table->id();
    $table->foreignId('usuario_id')->constrained();
    $table->foreignId('libro_id')->constrained();
    $table->date('fecha_prestamo');
    $table->date('fecha_devolucion');
    $table->enum('estado', ['activo', 'devuelto', 'retrasado']);
    $table->timestamps();
});
```

##### Seeders:
```php
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Crear categorías básicas
        Categoria::create(['nombre' => 'Ciencia Ficción']);
        Categoria::create(['nombre' => 'Historia']);
        Categoria::create(['nombre' => 'Tecnología']);
        
        // Crear autores de prueba
        Autor::factory(10)->create();
        
        // Crear libros de prueba
        Libro::factory(50)->create();
        
        // Crear usuarios de prueba
        Usuario::factory(20)->create();
    }
}
```

#### 2.2 CRUD Implementado

##### Controladores:
```php
class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::with(['autor', 'categoria'])->paginate(10);
        return view('libros.index', compact('libros'));
    }
    
    public function create()
    {
        $autores = Autor::all();
        $categorias = Categoria::all();
        return view('libros.create', compact('autores', 'categorias'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'isbn' => 'required|unique:libros',
            'autor_id' => 'required|exists:autores,id',
            'categoria_id' => 'required|exists:categorias,id'
        ]);
        
        Libro::create($validated);
        return redirect()->route('libros.index');
    }
}
```

##### Rutas:
```php
Route::middleware(['auth'])->group(function () {
    Route::resource('libros', LibroController::class);
    Route::resource('prestamos', PrestamoController::class);
    Route::resource('usuarios', UsuarioController::class);
});
```

#### 2.3 Relaciones entre Modelos

- **Usuario - Préstamos:** One-to-Many
- **Libro - Autor:** Many-to-One
- **Libro - Categoría:** Many-to-One
- **Usuario - Libros:** Many-to-Many (a través de préstamos)

#### 2.4 Autenticación y Roles

- Implementación de Laravel Sanctum para autenticación
- Middleware personalizado para control de roles
- Vistas de login y registro personalizadas

### 3. Evidencias de Funcionamiento

#### Capturas de Pantalla
- Página de bienvenida moderna y atractiva
- Dashboard con estadísticas en tiempo real
- Sistema de préstamos intuitivo
- Gestión de usuarios eficiente

#### Enlace al Repositorio
[GitHub - BiblioTech](https://github.com/Abel23005/BiblioTech)

### 4. Conclusiones

#### Logros Alcanzados
1. Implementación completa del CRUD para todas las entidades principales
2. Sistema de autenticación robusto con roles y permisos
3. Interfaz de usuario moderna y responsive
4. Base de datos bien estructurada con relaciones apropiadas

#### Dificultades Encontradas
1. Configuración inicial de las relaciones entre modelos
2. Implementación de la lógica de préstamos y devoluciones
3. Manejo de fechas en los préstamos

#### Próximos Pasos
1. Implementar sistema de notificaciones
2. Añadir generación de reportes en PDF
3. Desarrollar búsqueda avanzada de libros
4. Implementar sistema de reservas
5. Añadir estadísticas más detalladas

### 5. Anexos
- Diagrama de la base de datos
- Documentación de la API
- Manual de usuario básico 
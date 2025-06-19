<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ConfiguracionController extends Controller
{
    public function index()
    {
        return view('configuracion.general');
    }

    public function update(Request $request)
    {
        // Lógica para actualizar la configuración general
        // Aquí puedes guardar los valores en la base de datos o en el archivo de configuración
        // Por ejemplo, para actualizar el nombre de la biblioteca:
        // Config::set('app.name', $request->input('nombre_biblioteca'));
        // file_put_contents(config_path('app.php'), '<?php\n\nreturn ' . var_export(Config::all()['app'], true) . ';');
        
        return redirect()->back()->with('success', 'Configuración general actualizada con éxito.');
    }

    public function notificaciones(Request $request)
    {
        // Lógica para actualizar la configuración de notificaciones
        // Por ejemplo, para guardar las preferencias de notificación:
        // $user = auth()->user();
        // $user->notify_due_dates = $request->has('notificar_vencimiento');
        // $user->notify_availability = $request->has('notificar_disponibilidad');
        // $user->save();

        return redirect()->back()->with('success', 'Configuración de notificaciones actualizada con éxito.');
    }
} 
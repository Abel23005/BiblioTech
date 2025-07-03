<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white p-8 rounded shadow" style="padding-bottom: 60px;">
        <h2 class="text-2xl font-bold mb-6 text-center">¿Cómo deseas registrarte?</h2>
        <form method="GET" action="" id="preRegisterForm">
            <div>
                <label class="block mb-2 font-semibold">Selecciona tu tipo de usuario:</label>
                <div class="flex flex-col gap-4">
                    <label class="flex items-center">
                        <input type="radio" name="tipo" value="alumno" class="mr-2" required>
                        Alumno
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="tipo" value="bibliotecario" class="mr-2">
                        Bibliotecario
                    </label>
                </div>
            </div>
            <button type="submit" style="background: red; color: white; border: 2px solid black; font-size: 1rem; padding: 0.5rem; width: 100%; margin-top: 1rem; border-radius: 0.375rem; font-weight: 600;">Siguiente</button>
            <p id="errorTipo" class="text-red-600 text-sm mt-2 hidden">Por favor, selecciona un tipo de usuario.</p>
        </form>
    </div>
<script>
        document.getElementById('preRegisterForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const tipo = document.querySelector('input[name="tipo"]:checked');
            const error = document.getElementById('errorTipo');
            if (!tipo) {
                error.classList.remove('hidden');
                return;
            } else {
                error.classList.add('hidden');
            }
            if (tipo.value === 'alumno') {
                window.location.href = "{{ route('register') }}?tipo=alumno";
            } else if (tipo.value === 'bibliotecario') {
                window.location.href = "{{ route('register') }}?tipo=bibliotecario";
            }
    });
</script>
</x-guest-layout> 
<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">¿Cómo deseas registrarte?</h2>
        <form method="GET" action="" id="preRegisterForm">
            <div class="mb-6">
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
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Continuar</button>
        </form>
    </div>
    <script>
        document.getElementById('preRegisterForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const tipo = document.querySelector('input[name="tipo"]:checked').value;
            if (tipo === 'alumno') {
                window.location.href = "{{ route('register') }}?tipo=alumno";
            } else if (tipo === 'bibliotecario') {
                window.location.href = "{{ route('register') }}?tipo=bibliotecario";
            }
        });
    </script>
</x-guest-layout> 
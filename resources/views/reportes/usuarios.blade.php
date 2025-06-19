<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('app.user_report') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container-fluid px-4">
                        <h2 class="text-3xl font-extrabold text-primary-header mb-6 text-center">{{ __('app.user_report') }}</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <!-- Tarjeta de Alumnos Registrados -->
                            <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-200">
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-4">
                                        <div>
                                            <p class="text-lg font-semibold text-gray-700">{{ __('app.registered_students') }}</p>
                                            <h4 class="text-4xl font-extrabold text-primary-header">{{ $totalAlumnos }}</h4>
                                        </div>
                                        <i class="fas fa-user-graduate text-gray-500 text-5xl opacity-50"></i>
                                    </div>
                                    <div class="text-right mt-6">
                                        <a href="{{ route('reportes.alumnos') }}" class="inline-flex items-center px-4 py-2 btn-cta rounded-full font-semibold text-xs uppercase tracking-widest shadow-md">
                                            {{ __('app.view_more') }}
                                            <i class="fas fa-arrow-circle-right ml-2 text-sm"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Tarjeta de Bibliotecarios Registrados -->
                            <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-200">
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-4">
                                        <div>
                                            <p class="text-lg font-semibold text-gray-700">{{ __('app.registered_librarians') }}</p>
                                            <h4 class="text-4xl font-extrabold text-primary-header">{{ $totalBibliotecarios }}</h4>
                                        </div>
                                        <i class="fas fa-book-reader text-gray-500 text-5xl opacity-50"></i>
                                    </div>
                                    <div class="text-right mt-6">
                                        <a href="{{ route('reportes.bibliotecarios') }}" class="inline-flex items-center px-4 py-2 btn-cta rounded-full font-semibold text-xs uppercase tracking-widest shadow-md">
                                            {{ __('app.view_more') }}
                                            <i class="fas fa-arrow-circle-right ml-2 text-sm"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Gráfico de Registros de Usuarios -->
                        <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-200">
                            <div class="p-6 bg-primary-header border-b border-gray-200">
                                <h3 class="text-xl font-bold text-white">Registros de Usuarios por Mes</h3>
                            </div>
                            <div class="p-6 bg-white">
                                <canvas id="registrosUsuariosChart" width="400" height="200"></canvas>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let registrosPorMes = @json($registrosPorMes);
            let labels = registrosPorMes.map(item => item.period);
            let data = registrosPorMes.map(item => item.total);

            // Si no hay datos reales, mostrar datos de ejemplo
            if (labels.length === 0) {
                labels = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'];
                data = [10, 15, 8, 12, 7, 18];
            }

            const ctx = document.getElementById('registrosUsuariosChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Usuarios registrados',
                        data: data,
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Usuarios',
                                color: '#2C3E50'
                            },
                            ticks: {
                                color: '#2C3E50'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Mes',
                                color: '#2C3E50'
                            },
                            ticks: {
                                color: '#2C3E50'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#2C3E50'
                            }
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
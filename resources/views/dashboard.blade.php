@extends('c-app', [
    'title' => 'Dashboard',
    // 'showTitle' => true,
])

@section('content')
    <x-card>
        <div class="un-text-center un-text-xl un-font-semibold">DIAGRAM TANAH POLDA</div>
    </x-card>
    <div class="mb-5"></div>
    <x-card>
        <canvas id="bar-chart"></canvas>
    </x-card>
    <div class="mb-5"></div>
    <x-card>
        <canvas id="pie-chart" style="max-height: 80vh"></canvas>
    </x-card>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctxBar = document.getElementById('bar-chart');

        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['Sudah Sertifikat', 'Belum Sertifikat', 'Tanah Pinjam'],
                datasets: [{
                        label: 'Luas',
                        data: [
                            // konversi ke hektar
                            '{{ $tanah_polda->sudah_sertifikat_jumlah_luas }}',
                            '{{ $tanah_polda->belum_sertifikat_jumlah_luas }}',
                            '{{ $tanah_polda->pinjam_pakai_luas }}',
                        ],
                        backgroundColor: ['#3f97fe'],
                        borderWidth: 1
                    },
                    {
                        label: 'Unit',
                        data: [
                            '{{ $tanah_polda->sudah_sertifikat_jumlah_persil }}',
                            '{{ $tanah_polda->belum_sertifikat_jumlah_persil }}',
                            '{{ $tanah_polda->pinjam_pakai_persil }}',
                        ],
                        backgroundColor: ['#ff1931'],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(ctx, i) {
                                if (ctx.dataset.label.toLowerCase() == 'luas') {
                                    return 'Luas (m): ' + ctx.parsed.y;
                                } else {
                                    return 'Jumlah Unit: ' + ctx.parsed.y;
                                }
                            }
                        }
                    }
                }
            }
        });

        const ctxPie = document.getElementById('pie-chart');
        new Chart(ctxPie, {
            type: 'doughnut',
            data: {
                labels: ['Sudah Sertifikat', 'Belum Sertifikat', 'Tanah Pinjam'],
                datasets: [{
                        label: 'Luas',
                        data: [
                            '{{ $tanah_polda->sudah_sertifikat_jumlah_luas }}',
                            '{{ $tanah_polda->belum_sertifikat_jumlah_luas }}',
                            '{{ $tanah_polda->pinjam_pakai_luas }}',
                        ],
                        backgroundColor: ['#3f97fe', '#ff1931', '#6b7280'],
                        borderWidth: 1
                    },
                    {
                        label: 'Unit',
                        data: [
                            '{{ $tanah_polda->sudah_sertifikat_jumlah_persil }}',
                            '{{ $tanah_polda->belum_sertifikat_jumlah_persil }}',
                            '{{ $tanah_polda->pinjam_pakai_persil }}',
                        ],
                        backgroundColor: ['#3f97fe', '#ff1931', '#6b7280'],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(ctx, i) {
                                if (ctx.dataset.label.toLowerCase() == 'luas') {
                                    return 'Luas (m): ' + ctx.dataset.data[ctx.dataIndex];
                                } else {
                                    return 'Jumlah Unit: ' + ctx.dataset.data[ctx.dataIndex];
                                }
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection

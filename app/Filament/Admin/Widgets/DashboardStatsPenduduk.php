<?php

namespace App\Filament\Admin\Widgets;

use App\Models\DataPenduduk;
use App\Models\KategoriKemiskinan;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class DashboardStatsPenduduk extends StatsOverviewWidget
{
    protected ?string $pollingInterval = '30s';
    protected ?string $heading = 'Statistik Penduduk Kelurahan Tuwung';
    protected ?string $description = 'Informasi statistik penduduk secara keseluruhan.';
    protected int|array|null $columns = 3;

    protected function getStats(): array
    {
        // Gunakan cache untuk mencegah query berulang setiap 30 detik
        $data = Cache::remember('dashboard_stats_penduduk', now()->addSeconds(30), function () {
            return [
                'total' => DataPenduduk::count(),
                'per_kategori' => DataPenduduk::selectRaw('kategori_kemiskinan_id, COUNT(*) as jumlah')
                    ->groupBy('kategori_kemiskinan_id')
                    ->pluck('jumlah', 'kategori_kemiskinan_id'),
                'kategori' => KategoriKemiskinan::pluck('nama_kategori', 'id'),
            ];
        });

        $description = 'Diperbarui pada ' . now()->translatedFormat('H:i:s');

        $stats = [
            Stat::make('Total Penduduk', number_format($data['total']) . ' Orang')
                ->description($description)
                ->color('success')
                ->icon('heroicon-o-users')
                ->columnSpan(2),
        ];

        foreach ($data['kategori'] as $id => $namaKategori) {
            $jumlah = $data['per_kategori'][$id] ?? 0;

            $stats[] = Stat::make(
                'Penduduk ' . Str::title($namaKategori),
                number_format($jumlah) . ' Orang'
            )
                ->description($description)
                ->color('warning')
                ->icon('heroicon-o-user-group');
        }

        return $stats;
    }
}

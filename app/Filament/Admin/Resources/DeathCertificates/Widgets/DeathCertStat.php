<?php

namespace App\Filament\Admin\Resources\DeathCertificates\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DeathCertStat extends StatsOverviewWidget
{
    protected function getHeading(): ?string
    {
        return 'Analitik Surat Kematian';
    }

    protected function getDescription(): ?string
    {
        return 'Ikhtisar dari beberapa analitik.';
    }

    protected function getStats(): array
    {
        $data = \App\Models\DeathCertificate::all();
        $data = [
            'count' => $data->count(),
            'belum_diproses' => $data->where('status', 'Belum Diproses')->count(),
            'sedang_diproses' => $data->where('status', 'Sedang Diproses')->count(),
            'selesai' => $data->where('status', 'Selesai')->count(),
        ];

        return [
            //
            Stat::make('Total', 'Jumlah')->value($data['count'] ?? 0),
            Stat::make('Belum Diproses', 'Jumlah')->value($data['belum_diproses'] ?? 0),
            Stat::make('Sedang Diproses', 'Jumlah')->value($data['sedang_diproses'] ?? 0),
            Stat::make('Selesai', 'Jumlah')->value($data['selesai'] ?? 0),
        ];
    }
}

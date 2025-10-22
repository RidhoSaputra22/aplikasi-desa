<?php

namespace App\Filament\Admin\Widgets;

use Filament\Facades\Filament;
use App\Enums\CertificateStatus;
use App\Models\BirthCertificate;
use App\Models\DeathCertificate;
use App\Models\UsahaCertificate;
use App\Models\DomisiliCertificate;
use App\Models\TidakMampuCertificate;
use Illuminate\Support\Facades\Cache;
use App\Models\ParentIncomeCertificate;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Filament\Admin\Resources\BirthCertificates\BirthCertificateResource;
use App\Filament\Admin\Resources\DeathCertificates\DeathCertificateResource;
use App\Filament\Admin\Resources\UsahaCertificates\UsahaCertificateResource;
use App\Filament\Admin\Resources\DomisiliCertificates\DomisiliCertificateResource;
use App\Filament\Admin\Resources\TidakMampuCertificates\TidakMampuCertificateResource;
use App\Filament\Admin\Resources\ParentIncomeCertificates\ParentIncomeCertificateResource;

class DashboardStatsSurat extends StatsOverviewWidget
{
    protected ?string $pollingInterval = '30s';
    protected ?string $heading = 'Statistik Surat Online Belum Diverifikasi';
    protected ?string $description = 'Informasi Surat Online yang belum diverifikasi.';
    protected int|array|null $columns = 4;

    protected function getStats(): array
    {
        $description = 'Diperbarui pada ' . now()->translatedFormat('H:i:s');

        // Cache untuk mencegah query berulang
        $data = Cache::remember('dashboard_stats_surat', now()->addSeconds(30), function () {
            return [
                'kelahiran' => BirthCertificate::where('confirmation_status', CertificateStatus::PENDING)->count(),
                'penghasilan_ortu' => ParentIncomeCertificate::where('confirmation_status', CertificateStatus::PENDING)->count(),
                'kematian' => DeathCertificate::where('confirmation_status', CertificateStatus::PENDING)->count(),
                'domisili' => DomisiliCertificate::where('confirmation_status', CertificateStatus::PENDING)->count(),
                'usaha' => UsahaCertificate::where('confirmation_status', CertificateStatus::PENDING)->count(),
                'tidak_mampu' => TidakMampuCertificate::where('confirmation_status', CertificateStatus::PENDING)->count(),
            ];
        });

        /**
         * Daftar surat dan properti tampilannya:
         * - label: judul kartu
         * - model: resource class (untuk URL)
         * - column: columnSpan
         */
        $suratList = [
            'kelahiran' => [
                'label' => 'Surat Kelahiran',
                'resource' => BirthCertificateResource::class,
                'column' => 1,
            ],
            'penghasilan_ortu' => [
                'label' => 'Surat Penghasilan Orang Tua',
                'resource' => ParentIncomeCertificateResource::class,
                'column' => 2,
            ],
            'kematian' => [
                'label' => 'Surat Kematian',
                'resource' => DeathCertificateResource::class,
                'column' => 1,
            ],
            'domisili' => [
                'label' => 'Surat Domisili',
                'resource' => DomisiliCertificateResource::class,
                'column' => 1,
            ],
            'usaha' => [
                'label' => 'Surat Usaha',
                'resource' => UsahaCertificateResource::class,
                'column' => 1,
            ],
            'tidak_mampu' => [
                'label' => 'Surat Tidak Mampu',
                'resource' => TidakMampuCertificateResource::class,
                'column' => 2,
            ],
        ];

        $stats = [];

        foreach ($suratList as $key => $info) {
            $jumlah = $data[$key] ?? 0;

            // Dapatkan URL ke halaman index resource
            $url = $info['resource']::getUrl('index');

            $stats[] = Stat::make('Total ' . $info['label'], number_format($jumlah) . ' Surat')
                ->description($description)
                ->color('primary')
                ->icon('heroicon-o-document-text')
                ->url($url) // 👉 membuat kartu bisa diklik menuju resource
                ->extraAttributes([
                    'class' => 'cursor-pointer transition hover:bg-gray-50 dark:hover:bg-gray-800', // efek hover
                ])
                ->columnSpan($info['column']);
        }

        return $stats;
    }
}

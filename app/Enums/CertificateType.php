<?php

namespace App\Enums;

use App\Models\BirthCertificate;
use App\Models\DeathCertificate;
use App\Models\DomisiliCertificate;
use App\Models\ParentIncomeCertificate;
use App\Models\TidakMampuCertificate;
use App\Models\UsahaCertificate;

enum CertificateType: string
{
    case KELAHIRAN = 'kelahiran';
    case KEMATIAN = 'kematian';
    case DOMISILI = 'domisili';
    case PENGHASILAN_ORANG_TUA = 'penghasilan-orang-tua';
    case TIDAK_MAMPU = 'tidak-mampu';
    case USAHA = 'usaha';



    public function label(): string
    {
        return match ($this) {
            self::KELAHIRAN => 'Surat Keterangan Kelahiran',
            self::KEMATIAN => 'Surat Keterangan Kematian',
            self::DOMISILI => 'Surat Keterangan Domisili',
            self::PENGHASILAN_ORANG_TUA => 'Surat Keterangan Penghasilan Orang Tua',
            self::TIDAK_MAMPU => 'Surat Keterangan Tidak Mampu',
            self::USAHA => 'Surat Keterangan Usaha',
        };
    }

    public static function route(): array
    {
        return  [self::KELAHIRAN->value, self::KEMATIAN->value, self::DOMISILI->value, self::PENGHASILAN_ORANG_TUA->value, self::TIDAK_MAMPU->value, self::USAHA->value];
    }

    public function shortLabel(): string
    {
        return match ($this) {
            self::KELAHIRAN => 'Kelahiran',
            self::KEMATIAN => 'Kematian',
            self::DOMISILI => 'Domisili',
            self::PENGHASILAN_ORANG_TUA => 'Penghasilan Orang Tua',
            self::TIDAK_MAMPU => 'Tidak Mampu',
            self::USAHA => 'Usaha',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::KELAHIRAN => 'Surat keterangan untuk melaporkan kelahiran bayi',
            self::KEMATIAN => 'Surat keterangan untuk melaporkan kematian',
            self::DOMISILI => 'Surat keterangan tempat tinggal/domisili',
            self::PENGHASILAN_ORANG_TUA => 'Surat keterangan penghasilan orang tua untuk keperluan administrasi',
            self::TIDAK_MAMPU => 'Surat keterangan tidak mampu untuk bantuan sosial',
            self::USAHA => 'Surat keterangan usaha untuk keperluan administratif',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::KELAHIRAN => 'green',
            self::KEMATIAN => 'red',
            self::DOMISILI => 'blue',
            self::PENGHASILAN_ORANG_TUA => 'purple',
            self::TIDAK_MAMPU => 'orange',
            self::USAHA => 'indigo',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::KELAHIRAN => 'baby',
            self::KEMATIAN => 'cross',
            self::DOMISILI => 'home',
            self::PENGHASILAN_ORANG_TUA => 'currency-dollar',
            self::TIDAK_MAMPU => 'heart',
            self::USAHA => 'briefcase',
        };
    }

    public function modelClass(): mixed
    {
        return match ($this) {
            self::KELAHIRAN => BirthCertificate::all(),
            self::KEMATIAN => DeathCertificate::all(),
            self::DOMISILI => DomisiliCertificate::all(),
            self::PENGHASILAN_ORANG_TUA => ParentIncomeCertificate::all(),
            self::TIDAK_MAMPU => TidakMampuCertificate::all(),
            self::USAHA => UsahaCertificate::all(),
        };
    }

    public static function options(): array
    {
        return [
            self::KELAHIRAN->value => self::KELAHIRAN->label(),
            self::KEMATIAN->value => self::KEMATIAN->label(),
            self::DOMISILI->value => self::DOMISILI->label(),
            self::PENGHASILAN_ORANG_TUA->value => self::PENGHASILAN_ORANG_TUA->label(),
            self::TIDAK_MAMPU->value => self::TIDAK_MAMPU->label(),
            self::USAHA->value => self::USAHA->label(),
        ];
    }

    public static function shortOptions(): array
    {
        return [
            self::KELAHIRAN->value => self::KELAHIRAN->shortLabel(),
            self::KEMATIAN->value => self::KEMATIAN->shortLabel(),
            self::DOMISILI->value => self::DOMISILI->shortLabel(),
            self::PENGHASILAN_ORANG_TUA->value => self::PENGHASILAN_ORANG_TUA->shortLabel(),
            self::TIDAK_MAMPU->value => self::TIDAK_MAMPU->shortLabel(),
            self::USAHA->value => self::USAHA->shortLabel(),
        ];
    }

    public static function fromModelClass(string $modelClass): ?self
    {
        return match ($modelClass) {
            'App\Models\BirthCertificate' => self::KELAHIRAN,
            'App\Models\DeathCertificate' => self::KEMATIAN,
            'App\Models\DomisiliCertificate' => self::DOMISILI,
            'App\Models\ParentIncomeCertificate' => self::PENGHASILAN_ORANG_TUA,
            'App\Models\TidakMampuCertificate' => self::TIDAK_MAMPU,
            'App\Models\UsahaCertificate' => self::USAHA,
            default => null,
        };
    }
}

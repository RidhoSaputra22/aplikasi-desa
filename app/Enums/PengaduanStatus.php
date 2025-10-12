<?php

namespace App\Enums;

enum PengaduanStatus: string
{
    case PENDING = 'pending';
    case CONFIRM = 'confirm';
    case SUCCESS = 'success';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Menunggu',
            self::CONFIRM => 'Dikonfirmasi',
            self::SUCCESS => 'Berhasil',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'yellow',
            self::CONFIRM => 'blue',
            self::SUCCESS => 'green',
        };
    }

    public static function options(): array
    {
        return [
            self::PENDING->value => self::PENDING->label(),
            self::CONFIRM->value => self::CONFIRM->label(),
            self::SUCCESS->value => self::SUCCESS->label(),
        ];
    }
}

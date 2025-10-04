<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class CertificateCodeGenerator
{
    /**
     * Generate a certificate code in format: UXTI-UTQG-ZTEW
     *
     * @return string
     */
    public static function generate(): string
    {
        // Generate three groups of 4 random uppercase letters
        $group1 = self::generateRandomLetters(4);
        $group2 = self::generateRandomLetters(4);
        $group3 = self::generateRandomLetters(4);

        return "{$group1}-{$group2}-{$group3}";
    }

    /**
     * Generate a unique certificate code for a specific model
     * Ensures the code doesn't already exist in the database
     *
     * @param string|Model $model The model class name or instance
     * @param string $column The column name to check (default: 'code')
     * @return string
     */
    public static function generateUnique(string|Model $model, string $column = 'code'): string
    {
        $modelClass = is_string($model) ? $model : get_class($model);

        do {
            $code = self::generate();
        } while ($modelClass::where($column, $code)->exists());

        return $code;
    }

    /**
     * Generate random uppercase letters
     *
     * @param int $length
     * @return string
     */
    private static function generateRandomLetters(int $length): string
    {
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $result = '';

        for ($i = 0; $i < $length; $i++) {
            $result .= $letters[random_int(0, 25)];
        }

        return $result;
    }

    /**
     * Validate if a code matches the expected format
     *
     * @param string $code
     * @return bool
     */
    public static function isValidFormat(string $code): bool
    {
        return preg_match('/^[A-Z]{4}-[A-Z]{4}-[A-Z]{4}$/', $code) === 1;
    }

    /**
     * Generate multiple unique codes
     *
     * @param int $count
     * @param string|Model|null $model
     * @param string $column
     * @return array
     */
    public static function generateMultiple(int $count, string|Model $model = null, string $column = 'code'): array
    {
        $codes = [];

        for ($i = 0; $i < $count; $i++) {
            if ($model) {
                $codes[] = self::generateUnique($model, $column);
            } else {
                $codes[] = self::generate();
            }
        }

        return $codes;
    }
}

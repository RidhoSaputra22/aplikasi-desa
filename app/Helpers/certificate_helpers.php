<?php

if (!function_exists('generate_certificate_code')) {
    /**
     * Generate a unique certificate code in format: UXTI-UTQG-ZTEW
     *
     * @return string
     */
    function generate_certificate_code(): string
    {
        // Generate three groups of 4 random uppercase letters
        $group1 = generateRandomLetters(4);
        $group2 = generateRandomLetters(4);
        $group3 = generateRandomLetters(4);

        return "{$group1}-{$group2}-{$group3}";
    }
}

if (!function_exists('generateRandomLetters')) {
    /**
     * Generate random uppercase letters
     *
     * @param int $length
     * @return string
     */
    function generateRandomLetters(int $length): string
    {
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $result = '';

        for ($i = 0; $i < $length; $i++) {
            $result .= $letters[random_int(0, 25)];
        }

        return $result;
    }
}

if (!function_exists('generate_unique_certificate_code')) {
    /**
     * Generate a unique certificate code for a specific model
     * Ensures the code doesn't already exist in the database
     *
     * @param string $modelClass The model class name (e.g., 'App\Models\BirthCertificate')
     * @param string $column The column name to check (default: 'code')
     * @return string
     */
    function generate_unique_certificate_code(string $modelClass, string $column = 'code'): string
    {
        do {
            $code = generate_certificate_code();
        } while ($modelClass::where($column, $code)->exists());

        return $code;
    }
}

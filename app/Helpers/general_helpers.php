<?php

if (!function_exists('phone_to_international')) {
    /**
     * Convert Indonesian phone number from 08xxx to +628xxx format
     *
     * @param string $phone
     * @return string
     */
    function phone_to_international(string $phone): string
    {
        // Remove any spaces, dashes, or other non-numeric characters
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // If phone starts with 08, replace with 628
        if (substr($phone, 0, 2) === '08') {
            return '628' . substr($phone, 2);
        }

        // If phone starts with 8 (without 0), add 62
        if (substr($phone, 0, 1) === '8') {
            return '62' . $phone;
        }

        // If phone already starts with 62, return as is
        if (substr($phone, 0, 2) === '62') {
            return $phone;
        }

        // If phone starts with +62, remove the + sign
        if (substr($phone, 0, 3) === '+62') {
            return substr($phone, 1);
        }

        return $phone;
    }
}

if (!function_exists('phone_to_local')) {
    /**
     * Convert phone number to local Indonesian format (08xxx)
     *
     * @param string $phone
     * @return string
     */
    function phone_to_local(string $phone): string
    {
        // Remove any spaces, dashes, or other non-numeric characters
        $phone = preg_replace('/[^0-9+]/', '', $phone);

        // If phone starts with +628, replace with 08
        if (substr($phone, 0, 4) === '+628') {
            return '08' . substr($phone, 4);
        }

        // If phone starts with 628, replace with 08
        if (substr($phone, 0, 3) === '628') {
            return '08' . substr($phone, 3);
        }

        // If phone starts with 62 followed by 8, replace with 08
        if (substr($phone, 0, 2) === '62' && substr($phone, 2, 1) === '8') {
            return '08' . substr($phone, 3);
        }

        return $phone;
    }
}

if (!function_exists('format_phone_display')) {
    /**
     * Format phone number for display with dashes
     *
     * @param string $phone
     * @param string $format 'local' or 'international'
     * @return string
     */
    function format_phone_display(string $phone, string $format = 'local'): string
    {
        if ($format === 'international') {
            $phone = phone_to_international($phone);
            // Format: +62-8xx-xxxx-xxxx
            if (strlen($phone) >= 10) {
                return '+' . substr($phone, 0, 2) . '-' . substr($phone, 2, 3) . '-' . substr($phone, 5, 4) . '-' . substr($phone, 9);
            }
        } else {
            $phone = phone_to_local($phone);
            // Format: 08xx-xxxx-xxxx
            if (strlen($phone) >= 10) {
                return substr($phone, 0, 4) . '-' . substr($phone, 4, 4) . '-' . substr($phone, 8);
            }
        }

        return $phone;
    }
}

if (!function_exists('currency_format')) {
    /**
     * Format number to Indonesian Rupiah currency
     *
     * @param float|int $amount
     * @param bool $include_symbol
     * @return string
     */
    function currency_format($amount, bool $include_symbol = true): string
    {
        $formatted = number_format($amount, 0, ',', '.');

        return $include_symbol ? 'Rp ' . $formatted : $formatted;
    }
}

if (!function_exists('clean_string')) {
    /**
     * Clean string from special characters, keeping only alphanumeric and spaces
     *
     * @param string $string
     * @param bool $keep_spaces
     * @return string
     */
    function clean_string(string $string, bool $keep_spaces = true): string
    {
        if ($keep_spaces) {
            return preg_replace('/[^a-zA-Z0-9\s]/', '', $string);
        } else {
            return preg_replace('/[^a-zA-Z0-9]/', '', $string);
        }
    }
}

if (!function_exists('generate_slug')) {
    /**
     * Generate URL-friendly slug from string
     *
     * @param string $string
     * @param string $separator
     * @return string
     */
    function generate_slug(string $string, string $separator = '-'): string
    {
        // Convert to lowercase
        $string = strtolower($string);

        // Replace spaces with separator
        $string = str_replace(' ', $separator, $string);

        // Remove special characters except separator
        $string = preg_replace('/[^a-z0-9' . preg_quote($separator, '/') . ']/', '', $string);

        // Remove multiple separators
        $string = preg_replace('/' . preg_quote($separator, '/') . '+/', $separator, $string);

        // Remove separator from start and end
        return trim($string, $separator);
    }
}

if (!function_exists('format_file_size')) {
    /**
     * Format file size in human readable format
     *
     * @param int $bytes
     * @param int $precision
     * @return string
     */
    function format_file_size(int $bytes, int $precision = 2): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, $precision) . ' ' . $units[$i];
    }
}

if (!function_exists('truncate_text')) {
    /**
     * Truncate text to specified length with ellipsis
     *
     * @param string $text
     * @param int $length
     * @param string $suffix
     * @return string
     */
    function truncate_text(string $text, int $length = 100, string $suffix = '...'): string
    {
        if (strlen($text) <= $length) {
            return $text;
        }

        return substr($text, 0, $length) . $suffix;
    }
}

if (!function_exists('mask_string')) {
    /**
     * Mask part of a string for privacy (e.g., email, phone)
     *
     * @param string $string
     * @param int $visible_start
     * @param int $visible_end
     * @param string $mask_char
     * @return string
     */
    function mask_string(string $string, int $visible_start = 2, int $visible_end = 2, string $mask_char = '*'): string
    {
        $length = strlen($string);

        if ($length <= $visible_start + $visible_end) {
            return $string;
        }

        $start = substr($string, 0, $visible_start);
        $end = substr($string, -$visible_end);
        $mask_length = $length - $visible_start - $visible_end;

        return $start . str_repeat($mask_char, $mask_length) . $end;
    }
}

if (!function_exists('format_date_indonesia')) {
    /**
     * Format date to Indonesian format
     *
     * @param string|\DateTime $date
     * @param bool $include_day
     * @return string
     */
    function format_date_indonesia($date, bool $include_day = false): string
    {
        if (is_string($date)) {
            $date = new DateTime($date);
        }

        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        $days = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];

        $formatted = $date->format('j') . ' ' . $months[(int)$date->format('n')] . ' ' . $date->format('Y');

        if ($include_day) {
            $day_name = $days[$date->format('l')];
            $formatted = $day_name . ', ' . $formatted;
        }

        return $formatted;
    }
}

if (!function_exists('validate_indonesian_id')) {
    /**
     * Validate Indonesian ID number (NIK) - basic validation
     *
     * @param string $nik
     * @return bool
     */
    function validate_indonesian_id(string $nik): bool
    {
        // Remove any non-numeric characters
        $nik = preg_replace('/[^0-9]/', '', $nik);

        // NIK must be exactly 16 digits
        if (strlen($nik) !== 16) {
            return false;
        }

        // Basic format validation
        // First 6 digits: area code (should not be 000000)
        $area_code = substr($nik, 0, 6);
        if ($area_code === '000000') {
            return false;
        }

        // Digits 7-12: birth date (DDMMYY)
        $birth_date = substr($nik, 6, 6);
        $day = (int)substr($birth_date, 0, 2);
        $month = (int)substr($birth_date, 2, 2);
        $year = (int)substr($birth_date, 4, 2);

        // For females, day is added by 40
        if ($day > 40) {
            $day -= 40;
        }

        // Validate day and month
        if ($day < 1 || $day > 31 || $month < 1 || $month > 12) {
            return false;
        }

        return true;
    }
}

if (!function_exists('extract_gender_from_nik')) {
    /**
     * Extract gender from Indonesian ID number (NIK)
     *
     * @param string $nik
     * @return string|null 'L' for male, 'P' for female, null if invalid
     */
    function extract_gender_from_nik(string $nik): ?string
    {
        $nik = preg_replace('/[^0-9]/', '', $nik);

        if (strlen($nik) !== 16) {
            return null;
        }

        $day = (int)substr($nik, 6, 2);

        // If day > 40, it's female
        return $day > 40 ? 'P' : 'L';
    }
}

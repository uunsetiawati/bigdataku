<?php

if (!function_exists('convert_excel_date')) {
    function convert_excel_date($value) {
        // Gunakan PhpSpreadsheet untuk deteksi serial Excel
        if (is_numeric($value)) {
            try {
                $dateObj = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value);
                return $dateObj->format('Y-m-d');
            } catch (Exception $e) {
                return null;
            }
        }

        // Jika berupa string (misalnya: "06-05-2025")
        $parsed = DateTime::createFromFormat('d-m-Y', $value);
        if ($parsed) {
            return $parsed->format('Y-m-d');
        }

        // Fallback terakhir pakai strtotime
        $timestamp = strtotime($value);
        if ($timestamp) {
            return date('Y-m-d', $timestamp);
        }

        // Jika semua gagal
        return null;
    }
}

?>

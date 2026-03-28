<?php

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

if (!function_exists('token_form_generate')) {
    function token_form_generate(): string
    {
        // Dapatkan timestamp saat ini (detik)
        $nowTimestamp = now()->timestamp;

        // Convert ke string sebelum encrypt, tambahkan identifier
        $token = Crypt::encryptString((string) $nowTimestamp . "-token_form_generate");

        return $token;
    }
}

if (!function_exists('token_form_decrypt')) {
    function tokenFormDecrypt(string $token): ?string
    {
        try {
            return Crypt::decryptString($token);
        } catch (\Exception $e) {
            return null; // token invalid
        }
    }
}

if (!function_exists('token_form_check')) {
    function tokenFormCheck(string $token): ?string
    {
        // Jika token tidak ada
        if (!$token) {
            return 'Ups, token tidak ditemukan';
        }

        // Decrypt token
        $decrypted = tokenFormDecrypt($token);

        // Cek validitas token
        if (!$decrypted || !Str::contains($decrypted, 'token_form_generate')) {
            return 'Ups, token tidak valid';
        }

        // Cek double submit
        if (session()->has('_token_form') && session('_token_form') === $token) {
            return 'Ups, form sudah dikirim, harap jangan menekan tombol lagi';
        }

        // Simpan token terakhir di session
        session(['_token_form' => $token]);

        return null; // token valid, lanjut proses
    }
}

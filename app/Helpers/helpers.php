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
    function token_form_decrypt(string $token): ?string
    {
        try {
            return Crypt::decryptString($token);
        } catch (\Exception $e) {
            return null; // token invalid
        }
    }
}

if (!function_exists('form_token_check')) {
    /**
     * Cek token form untuk mencegah double submit
     *
     * @param Request $request
     * @param string $redirectUrl
     * @return RedirectResponse|null
     */
    function form_token_check($token, string $redirectUrl): ?RedirectResponse
    {
        // Jika token tidak ada
        if (!$token) {
            return redirect($redirectUrl)
                ->withInput()
                ->with('error', 'Ups, token tidak ditemukan');
        }

        // Decrypt token
        $decrypted = token_form_decrypt($token);

        // Cek validitas token
        if (!$decrypted || !Str::contains($decrypted, 'token_form_generate')) {
            return redirect($redirectUrl)
                ->withInput()
                ->with('error', 'Ups, token tidak valid');
        }

        // Cek double submit
        if (session()->has('_token_form') && session('_token_form') === $token) {
            return redirect($redirectUrl)
                ->withInput()
                ->with('error', 'Ups, form sudah dikirim, harap jangan menekan tombol lagi');
        }

        // Simpan token terakhir di session
        session(['_token_form' => $token]);

        return null; // token valid, lanjut proses
    }
}

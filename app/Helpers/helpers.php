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
    function form_token_check(Request $request, string $redirectUrl): ?RedirectResponse
    {
        $_token_form = $request->input('_token_form');

        // Jika token tidak ada
        if (!$_token_form) {
            return redirect($redirectUrl)
                ->withInput()
                ->with('error', 'Ups, token tidak ditemukan');
        }

        // Decrypt token
        $decrypted = token_form_decrypt($_token_form);

        // Cek validitas token
        if (!$decrypted || !Str::contains($decrypted, 'token_form_generate')) {
            return redirect($redirectUrl)
                ->withInput()
                ->with('error', 'Ups, token invalid');
        }

        // Cek double submit
        if (session()->has('last_token_form') && session('last_token_form') === $_token_form) {
            return redirect($redirectUrl)
                ->withInput()
                ->with('error', 'Ups, kamu menekan tombol simpan dua kali');
        }

        // Simpan token terakhir di session
        session(['last_token_form' => $_token_form]);

        return null; // token valid, lanjut proses
    }
}

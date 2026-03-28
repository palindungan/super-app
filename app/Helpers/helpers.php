<?php

use Illuminate\Support\Facades\Crypt;

if (!function_exists('token_form_generate')) {
    function token_form_generate()
    {
        // Dapatkan timestamp saat ini (detik)
        $nowTimestamp = now()->timestamp; // integer

        // Convert ke string sebelum encrypt
        $token = Crypt::encryptString((string) $nowTimestamp);

        return $token;
    }
}

if (!function_exists('form_token_check')) {
    function form_token_check($request, $url)
    {
        $_token_form = $request->input('_token_form');

        if (session()->has('last_token_form') && session('last_token_form') === $_token_form) {
            return redirect($url)->withInput()->with('error', 'Ups, kamu menekan tombol simpan dua kali.');
        }

        session(['last_token_form' => $_token_form]);

        return null;
    }
}

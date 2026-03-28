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

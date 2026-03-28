<?php

use Illuminate\Support\Facades\Crypt;

if (!function_exists('generate_token_form')) {
    function generate_token_form()
    {
        // Dapatkan timestamp saat ini (detik)
        $nowTimestamp = now()->timestamp; // integer

        // Convert ke string sebelum encrypt
        $token = Crypt::encryptString((string) $nowTimestamp);

        return $token;
    }
}

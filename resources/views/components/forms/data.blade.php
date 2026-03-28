@php
    use Illuminate\Support\Facades\Crypt;

    // Dapatkan timestamp saat ini (detik)
    $nowTimestamp = now()->timestamp; // integer

    // Convert ke string sebelum encrypt
    $token = Crypt::encryptString((string) $nowTimestamp);
@endphp

@method($method)
@csrf
<input type="hidden" name="_token_form" value="{{ $token }}" autocomplete="off">

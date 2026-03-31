<script>
    $(document).ready(function() {
        @if (session('success'))
            notify(
                'icon-check',
                'Berhasil',
                "{!! addslashes(session('success')) !!}",
                'success'
            );
        @endif

        @if (session('error'))
            notify(
                'icon-close',
                'Gagal',
                "{!! addslashes(session('error')) !!}",
                'danger'
            );
        @endif

        @if ($errors->any())
            @php
                $firstError = $errors->first();
                $total = $errors->count();
                $message = $firstError;
                if ($total > 1) {
                    $message .= ' (dan ' . ($total - 1) . ' error lainnya)';
                }
            @endphp

            notify(
                'icon-close',
                'Gagal',
                "{!! addslashes($message) !!}",
                'danger'
            );
        @endif
    });
</script>

<script>
    function notify(icon, title, message, type) {
        $.notify({
            icon,
            title,
            message
        }, {
            type,
            delay: 5000,
            placement: {
                from: "top",
                align: "right"
            },
            z_index: 9999
        });
    }

    function notifyOnSuccess(response) {
        const message = response?.message || "Data berhasil diproses";
        notify("icon-check", "Berhasil", message, "success");
    }

    function notifyOnError(error) {
        const message =
            error?.responseJSON?.message ||
            error?.statusText ||
            "Terjadi kesalahan";
        notify("icon-close", "Gagal", message, "danger");
    }
</script>

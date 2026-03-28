<script>
    $(document).ready(function() {
        @if (session('success'))
            $.notify({
                icon: 'icon-check',
                title: "Berhasil",
                message: "{!! addslashes(session('success')) !!}"
            }, {
                type: "success",
                delay: 5000, // durasi muncul notifikasi
                placement: {
                    from: "top",
                    align: "right"
                },
                z_index: 9999
            });
        @endif

        @if (session('error'))
            $.notify({
                icon: 'icon-close',
                title: "Gagal",
                message: "{!! addslashes(session('error')) !!}"
            }, {
                type: "danger",
                delay: 5000,
                placement: {
                    from: "top",
                    align: "right"
                },
                z_index: 9999
            });
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

            $.notify({
                icon: 'icon-close',
                title: "Gagal",
                message: "{!! addslashes($message) !!}"
            }, {
                type: "danger",
                delay: 5000,
                placement: {
                    from: "top",
                    align: "right"
                },
                z_index: 9999
            });
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

    function notifyOnError(xhr) {
        const message =
            // xhr?.responseJSON?.message ||
            xhr?.statusText ||
            "Terjadi kesalahan";
        notify("icon-close", "Gagal", message, "danger");
    }
</script>

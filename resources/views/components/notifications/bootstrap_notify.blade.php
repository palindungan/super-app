<script>
    $(document).ready(function() {
        @if (session('success'))
            $.notify({
                icon: 'icon-check',
                title: "Berhasil",
                message: "{{ session('success') }}"
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
                message: "{{ session('error') }}"
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
                message: "{{ $message }}"
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

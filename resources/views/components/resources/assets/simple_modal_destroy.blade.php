@push('scripts')
    <script>
        async function destroyAction(url, name) {
            // Tampilkan konfirmasi
            const confirmed = await destroyConfirm(name);
            if (!confirmed) return;

            // Tampilkan loading
            swalShowLoading("Menghapus...", "Mohon tunggu");

            try {
                // Kirim request delete
                const response = await destroyApi(url);

                // Jika berhasil
                notifyOnSuccess(response);

                // reload datatable tanpa reset pagination
                datatable.ajax.reload(null, false);
            } catch (error) {
                // Jika gagal
                notifyOnError(error);
            } finally {
                // Tutup loading
                setTimeout(function() {
                    Swal.close();
                }, 500);
            }
        }

        function destroyConfirm(name) {
            const iconHtml = `<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
            </svg>`;

            return Swal.fire({
                icon: "warning",
                iconHtml: iconHtml,
                title: `Hapus Peran ${name}`,
                text: "Apakah Anda yakin?",
                showCancelButton: true,
                confirmButtonText: "Hapus",
                cancelButtonText: "Batal",
                customClass: {
                    confirmButton: "btn btn-danger me-2",
                    cancelButton: "btn btn-light"
                }
            }).then(result => result.isConfirmed);
        }

        function destroyApi(url) {
            return $.ajax({
                url: url,
                type: "DELETE",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
    </script>
@endpush

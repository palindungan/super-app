<div class="table-responsive">
    <table id="datatable" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nama Penjaga</th>
                <th>Izin</th>
                <th>Dirubah</th>
                <th></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

@push('scripts')
    <script>
        let datatable;
        $(document).ready(function() {
            datatable = new DataTable('#datatable', {
                language: {
                    url: "{{ asset('assets/json/plugin/datatables/id.json') }}"
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url()->current() }}",
                    data: function(d) {
                        d.datatable = 'main';
                    },
                    error: function(xhr) {
                        try {
                            console.error(JSON.parse(xhr.responseText));
                        } catch (e) {
                            console.error(xhr.responseText);
                        }
                    }
                },
                order: [
                    [0, 'asc']
                ],
                columns: [{
                        data: 'name',
                        name: 'roles.name',
                        defaultContent: '-'
                    },
                    {
                        data: 'guard_name',
                        name: 'roles.guard_name',
                        defaultContent: '-'
                    },
                    {
                        data: 'permissions_count',
                        name: 'permission_counts.permissions_count',
                        defaultContent: '-'
                    },
                    {
                        data: 'updated_at',
                        name: 'roles.updated_at',
                        defaultContent: '-'
                    },
                    {
                        data: 'action',
                        name: 'roles.id',
                        className: 'text-end',
                        defaultContent: '-',
                        orderable: false,
                        searchable: false
                    }
                ],
                stateSave: true,
                searchDelay: 500
            });
        });
    </script>

    <script>
        // ========================
        // MAIN FUNCTION
        // ========================
        async function actionDestroy(url, name) {
            // 1. Tampilkan konfirmasi
            const confirmed = await confirmDelete(name);
            if (!confirmed) return;

            // 2. Tampilkan loading
            showLoading("Menghapus...", "Mohon tunggu");

            try {
                // 3. Ambil token tambahan dari server
                const token = await getFormToken();

                // 4. Kirim request delete
                const response = await sendDelete(url, token);

                // 5. Jika berhasil
                onSuccess(response);
            } catch (error) {
                // 6. Jika gagal
                onError(error);
            } finally {
                // 7. Tutup loading
                Swal.close();
            }
        }

        // ========================
        // KONFIRMASI
        // ========================
        function confirmDelete(name) {
            return Swal.fire({
                icon: "warning",
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

        // ========================
        // API
        // ========================
        function getFormToken() {
            return $.ajax({
                url: "{{ url()->current() }}",
                type: "GET",
                data: {
                    action: "token_form_generate"
                }
            }).then(res => res?.data); // aman kalau null
        }

        function sendDelete(url, token) {
            return $.ajax({
                url: url,
                type: "DELETE",
                data: {
                    _token: getCsrfToken(),
                    _token_form: token
                }
            });
        }

        function getCsrfToken() {
            return $('meta[name="csrf-token"]').attr('content') || '';
        }

        // ========================
        // UI
        // ========================
        function showLoading(title, text) {
            Swal.fire({
                title,
                text,
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => Swal.showLoading()
            });
        }

        function onSuccess(response) {
            const message = response?.message || "Data berhasil dihapus";

            notify("success", "Berhasil", "icon-check", message);

            // reload datatable tanpa reset pagination
            datatable.ajax.reload(null, false);
        }

        function onError(xhr) {
            const message =
                xhr?.responseJSON?.message ||
                xhr?.statusText ||
                "Terjadi kesalahan";

            notify("danger", "Gagal", "icon-close", message);
        }

        // ========================
        // NOTIFICATION
        // ========================
        function notify(type, title, icon, message) {
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
    </script>
@endpush

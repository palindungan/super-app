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
                Swal.close();
            }
        }

        function destroyConfirm(name) {
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

        function destroyApi(url) {
            return $.ajax({
                url: url,
                type: "DELETE",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                }
            });
        }

        function swalShowLoading(title, text) {
            Swal.fire({
                title,
                text,
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => Swal.showLoading()
            });
        }

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
                xhr?.responseJSON?.message ||
                xhr?.statusText ||
                "Terjadi kesalahan";
            notify("icon-close", "Gagal", message, "danger");
        }
    </script>
@endpush

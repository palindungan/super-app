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

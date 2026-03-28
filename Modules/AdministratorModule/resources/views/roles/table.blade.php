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

                deferRender: true,
                stateSave: true,
                searchDelay: 500
            });
        });

        function action_destroy(url, name) {
            Swal.fire({
                icon: "warning",
                title: `Hapus Peran ${name}`,
                text: "Apakah Anda yakin ingin melakukan ini?",
                showCancelButton: true,
                confirmButtonText: "Hapus",
                cancelButtonText: "Batal",
                allowOutsideClick: false,
                buttonsStyling: false, // WAJIB biar class bootstrap kepake
                customClass: {
                    confirmButton: "btn btn-danger me-2",
                    cancelButton: "btn btn-light"
                }
            }).then((result) => {
                if (result.isConfirmed) {

                    Swal.fire({
                        title: "Menghapus...",
                        text: "Mohon tunggu",
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {

                            Swal.close();

                            $.notify({
                                icon: 'icon-check',
                                title: "Berhasil",
                                message: response.message,
                            }, {
                                type: "success",
                                delay: 5000, // durasi muncul notifikasi
                                placement: {
                                    from: "top",
                                    align: "right"
                                },
                                z_index: 9999
                            });

                            datatable.ajax.reload(null, false);
                        },
                        error: function(xhr) {

                            Swal.close();

                            let message = xhr.statusText || xhr.responseJSON?.message;

                            $.notify({
                                icon: 'icon-close',
                                title: "Gagal",
                                message: message,
                            }, {
                                type: "danger",
                                delay: 5000,
                                placement: {
                                    from: "top",
                                    align: "right"
                                },
                                z_index: 9999
                            });
                        }
                    });
                }
            });
        }
    </script>
@endpush

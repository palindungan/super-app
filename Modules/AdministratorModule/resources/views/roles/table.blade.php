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

        function actionDestroy(url, name) {
            confirmDelete(name).then((confirmed) => {
                if (!confirmed) return;

                showLoading();

                generateFormToken()
                    .then((token) => deleteData(url, token))
                    .then((response) => handleSuccess(response))
                    .catch((error) => handleError(error))
                    .finally(() => Swal.close());
            });
        }

        function confirmDelete(name) {
            return Swal.fire({
                icon: "warning",
                title: `Hapus Peran ${name}`,
                text: "Apakah Anda yakin ingin melakukan ini?",
                showCancelButton: true,
                confirmButtonText: "Hapus",
                cancelButtonText: "Batal",
                allowOutsideClick: false,
                buttonsStyling: false,
                customClass: {
                    confirmButton: "btn btn-danger me-2",
                    cancelButton: "btn btn-light"
                }
            }).then(result => result.isConfirmed);
        }

        function showLoading() {
            Swal.fire({
                title: "Menghapus...",
                text: "Mohon tunggu",
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => Swal.showLoading()
            });
        }

        function generateFormToken() {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: "{{ url()->current() }}",
                    type: 'GET',
                    data: {
                        action: "token_form_generate"
                    },
                    success: (res) => resolve(res.data),
                    error: (xhr) => reject(xhr)
                });
            });
        }

        function deleteData(url, token) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        _token_form: token
                    },
                    success: resolve,
                    error: reject
                });
            });
        }

        function handleSuccess(response) {
            notifySuccess(response.message);
            datatable.ajax.reload(null, false);
        }

        function handleError(xhr) {
            let message = xhr.responseJSON?.message || xhr.statusText;
            notifyError(message);
        }

        function notifySuccess(message) {
            $.notify({
                icon: 'icon-check',
                title: "Berhasil",
                message: message,
            }, getNotifyConfig("success"));
        }

        function notifyError(message) {
            $.notify({
                icon: 'icon-close',
                title: "Gagal",
                message: message,
            }, getNotifyConfig("danger"));
        }

        function getNotifyConfig(type) {
            return {
                type: type,
                delay: 5000,
                placement: {
                    from: "top",
                    align: "right"
                },
                z_index: 9999
            };
        }
    </script>
@endpush

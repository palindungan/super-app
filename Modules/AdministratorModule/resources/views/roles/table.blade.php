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
        $(document).ready(function() {
            datatable = $('#datatable').DataTable({
                autoWidth: false,
                language: {
                    url: "{{ asset('assets/js/plugin/datatables/Indonesian.json') }}",
                },

                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url()->current() }}?datatable=main',
                    type: 'GET',
                },

                columnDefs: [{
                    orderable: false,
                    targets: [4],
                }],
                order: [
                    [0, 'asc'],
                ],
                columns: [{
                        data: 'name',
                        name: 'roles.name',
                        className: '',
                        defaultContent: '-'
                    },
                    {
                        data: 'guard_name',
                        name: 'roles.guard_name',
                        className: '',
                        defaultContent: '-'
                    },
                    {
                        data: 'permissions_count',
                        name: 'permission_counts.permissions_count',
                        className: '',
                        defaultContent: '-'
                    },
                    {
                        data: 'updated_at',
                        name: 'roles.updated_at',
                        className: '',
                        defaultContent: '-'
                    },
                    {
                        data: 'action',
                        name: 'roles.id',
                        className: 'text-end',
                        defaultContent: '-'
                    },
                ],
            });
        });

        function action_destroy(url, name) {
            swal({
                title: `Hapus Peran ${name}`,
                text: `Apakah Anda yakin ingin melakukan ini?`,
                icon: "warning",
                buttons: {
                    confirm: {
                        text: "Hapus",
                        className: "btn btn-danger",
                    },
                    cancel: {
                        visible: true,
                        text: "Batal",
                        className: "btn btn-light",
                    },
                },
                dangerMode: true,
            }).then((confirm) => {
                if (confirm) {
                    // Lakukan request penghapusan data
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            swal("Good job!", "You clicked the button!", {
                                icon: "success",
                                buttons: {
                                    confirm: {
                                        className: 'btn btn-success'
                                    }
                                },
                            });
                        },
                        error: function(xhr) {
                            swal("Good job!", "You clicked the button!", {
                                icon: "error",
                                buttons: {
                                    confirm: {
                                        className: 'btn btn-danger'
                                    }
                                },
                            });
                        }
                    });
                } else {
                    swal.close();
                }
            });
        }
    </script>
@endpush

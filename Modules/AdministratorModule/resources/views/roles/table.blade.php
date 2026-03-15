<div class="table-responsive">
    <table id="basic_datatables" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nama Penjaga</th>
                <th>Izin</th>
                <th></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            basic_datatables = $('#basic_datatables').DataTable({
                autoWidth: false,
                language: {
                    url: "{{ asset('assets/js/plugin/datatables/Indonesian.json') }}",
                },

                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url()->current() }}?datatables=main',
                    type: 'GET',
                },

                columnDefs: [{
                    orderable: false,
                    targets: [3],
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
                        data: 'action',
                        name: 'roles.id',
                        className: 'text-end',
                        defaultContent: '-'
                    },
                ],
            });
        });
    </script>
@endpush

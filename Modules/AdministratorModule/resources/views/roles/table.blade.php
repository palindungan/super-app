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
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    "url": "{{ url()->current() }}?datatables=main",
                    "type": "GET",
                },
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
                        data: 'action',
                        name: 'roles.id',
                        className: '',
                        defaultContent: '-'
                    },
                ],
            });
        });
    </script>
@endpush

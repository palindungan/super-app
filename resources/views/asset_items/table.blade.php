<div class="table-responsive">
    <table id="datatable" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Simbol</th>
                <th>Satuan Pecahan</th>
                <th>Status Aktif</th>
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
                        data: 'code',
                        name: 'currencies.code',
                        defaultContent: '-'
                    },
                    {
                        data: 'name',
                        name: 'currencies.name',
                        defaultContent: '-'
                    },
                    {
                        data: 'symbol',
                        name: 'currencies.symbol',
                        defaultContent: '-'
                    },
                    {
                        data: 'minor_unit',
                        name: 'currencies.minor_unit',
                        defaultContent: '-'
                    },
                    {
                        data: 'is_active',
                        name: 'currencies.is_active',
                        defaultContent: '-',
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'currencies.id',
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
@endpush

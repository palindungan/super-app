<div class="table-responsive">
    <table id="datatable" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Lokasi Asal</th>
                <th>Lokasi Tujuan</th>
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
                        name: 'asset_transactions.code',
                        defaultContent: '-'
                    },
                    {
                        data: 'date',
                        name: 'asset_transactions.date',
                        defaultContent: '-'
                    },
                    {
                        data: 'notes',
                        name: 'asset_transactions.notes',
                        defaultContent: '-'
                    },
                    {
                        data: 'origin_location_name',
                        name: 'origin_locations.name',
                        defaultContent: '-'
                    },
                    {
                        data: 'destination_location_name',
                        name: 'destination_locations.name',
                        defaultContent: '-'
                    },
                    {
                        data: 'action',
                        name: 'asset_transactions.id',
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

<div class="table-responsive">
    <table id="datatable" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>Kode Transaksi</th>
                <th>Tanggal</th>
                <th>Lokasi Awal</th>
                <th>Lokasi Tujuan</th>

                <th>Kode Aset</th>
                <th>Nama Aset</th>
                <th>Harga Beli</th>
                <th>Jumlah</th>
                <th>Nilai Aset</th>
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
                        data: 'asset_transaction_code',
                        name: 'asset_transactions.code',
                        defaultContent: '-'
                    },
                    {
                        data: 'asset_transaction_date',
                        name: 'asset_transactions.date',
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
                        data: 'asset_item_code',
                        name: 'asset_items.code',
                        defaultContent: '-'
                    },
                    {
                        data: 'asset_item_name',
                        name: 'asset_items.name',
                        defaultContent: '-'
                    },
                    {
                        data: 'purchase_price',
                        name: 'asset_transaction_items.purchase_price',
                        defaultContent: '-'
                    },
                    {
                        data: 'quantity',
                        name: 'asset_transaction_items.quantity',
                        defaultContent: '-'
                    },
                    {
                        data: 'asset_value',
                        name: 'asset_transaction_items.asset_value',
                        defaultContent: '-'
                    }
                ],
                stateSave: true,
                searchDelay: 500
            });
        });
    </script>
@endpush

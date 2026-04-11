<div class="table-responsive">
    <table id="datatable" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>Aset</th>
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

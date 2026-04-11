<div class="table-responsive">
    <table id="datatable" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>asset_item_id</th>
                <th>purchase_price</th>
                <th>quantity</th>
                <th>asset_value</th>
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
                    url: "{{ route('asset_transactions.asset_transaction_items.index', $asset_transaction->id) }}",
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
                        data: 'asset_item_id',
                        name: 'asset_transaction_items.asset_item_id',
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
                    },
                    {
                        data: 'action',
                        name: 'asset_transaction_items.id',
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

<div class="table-responsive">
    <table id="datatable" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Tanggal Beli</th>
                <th>Harga Beli</th>
                <th>Foto</th>
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
                        name: 'asset_items.code',
                        defaultContent: '-'
                    },
                    {
                        data: 'name',
                        name: 'asset_items.name',
                        defaultContent: '-'
                    },
                    {
                        data: 'asset_category_name',
                        name: 'asset_categories.name',
                        defaultContent: '-'
                    },
                    {
                        data: 'asset_status_name',
                        name: 'asset_statuses.name',
                        defaultContent: '-'
                    },
                    {
                        data: 'purchase_date',
                        name: 'asset_items.purchase_date',
                        defaultContent: '-',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'purchase_price',
                        name: 'asset_items.purchase_price',
                        defaultContent: '-',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'photo',
                        name: 'asset_items.photo',
                        defaultContent: '-',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'asset_items.id',
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

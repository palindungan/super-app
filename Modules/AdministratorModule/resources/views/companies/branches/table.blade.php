@include('components.resources.assets.simple_modal_destroy')

<div class="table-responsive">
    <table id="datatable" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Pengguna Aktif</th>
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
                    url: "{{ route('administrator.companies.branches.index', $company->id) }}",
                    data: function(d) {
                        d.datatable = 'main';
                        d.get_by_company_id = {{ $company->id }};
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
                        name: 'branches.code',
                        defaultContent: '-'
                    },
                    {
                        data: 'name',
                        name: 'branches.name',
                        defaultContent: '-'
                    },
                    {
                        data: 'branch_user_count',
                        name: 'branch_user_count',
                        defaultContent: '-'
                    },
                    {
                        data: 'action',
                        name: 'branches.id',
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

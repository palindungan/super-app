@extends('components.layouts.master_1.main')

@section('sidebar.asset_items.active', 'active')

@include('components.resources.assets.v1.index')

@push('scripts')
    @include('components.validation.script')
@endpush

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row" style="padding-bottom: 20px;">
        <div>
            <h3 class="fw-bold mb-3">Peran</h3>
        </div>
        @include('components.layouts.master_1.breadcrumb.main2', [
            'breadcrumbs' => [
                ['label' => 'Data Master'],
                ['label' => 'Aset', 'url' => route('asset_items.index')],
                ['label' => 'Daftar'],
            ],
        ])
        <div class="ms-md-auto py-2 py-md-0 mb-3">
            <div class="btn-group dropdown">
                <button class="btn btn-label-info btn-round me-2 dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Export
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a class="dropdown-item" href="{{ route('asset_items.exportExcel') }}">Excel</a>
                        {{-- <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a> --}}
                    </li>
                </ul>
            </div>
            {{-- <a href="#" class="btn btn-primary btn-round">Button</a> --}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Aset</h4>
                        <button class="btn btn-primary btn-round ms-auto"
                            onclick="createAction($('#fields_form'), $('#fields_modal'))">
                            <i class="fa fa-plus"></i>
                            Buat Aset
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @include('asset_items.table')
                </div>
            </div>
        </div>
    </div>

    @include('asset_items.fields')
@endsection

@include('components.resources.assets.v1.simple_modal_create', [
    'url' => route('asset_items.store'),
])
@include('components.resources.assets.v1.simple_modal_destroy')
@include('components.resources.assets.v1.simple_modal_edit')
@include('components.resources.assets.v1.simple_modal_show')
@push('scripts')
    <script>
        function editInput($form, response) {
            const data = response.data;
            $.each(data, function(key, value) {
                const $field = $form.find('[id="' + key + '"]');

                if (!$field.length) return;

                // jika input type file jangan diisi
                if ($field.attr('type') === 'file') {
                    return;
                }

                if ($field.attr('type') === 'checkbox') {
                    $field.prop('checked', value == 1 || value === true);
                } else {
                    $field.val(value);
                }
            });

            editTitleData(data);
        }
    </script>
    <script>
        function editTitleData(data) {
            $('#edit_title_data').text(data.name);
        }
    </script>
@endpush

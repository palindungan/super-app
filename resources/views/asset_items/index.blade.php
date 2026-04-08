@extends('components.layouts.master_1.main')

@section('sidebar.asset_items.active', 'active')

@include('components.resources.assets.index')

@push('scripts')
    @include('components.validation.script')
@endpush

@section('content')
    <div class="page-header">
        <h3 class="fw-bold mb-3">Barang</h3>
        @include('components.layouts.master_1.breadcrumb.main', [
            'breadcrumbs' => [
                ['label' => 'Aset'],
                ['label' => 'Barang', 'url' => route('asset_items.index')],
                ['label' => 'Daftar'],
            ],
        ])
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Barang</h4>
                        <button class="btn btn-primary btn-round ms-auto" onclick="createAction()">
                            <i class="fa fa-plus"></i>
                            Buat Barang
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

@include('components.resources.assets.simple_modal_create', [
    'url' => route('asset_items.store'),
])
@include('components.resources.assets.simple_modal_edit')
@include('components.resources.assets.simple_modal_show')
@push('scripts')
    <script>
        function editTitleData(data) {
            $('#edit_title_data').text(data.name);
        }
    </script>
@endpush

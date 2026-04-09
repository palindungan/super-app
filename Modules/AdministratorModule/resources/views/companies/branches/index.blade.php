@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/plugin/datatables/dataTables.bootstrap5.min.css') }}" />
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/plugin/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/datatables/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/sweetalert2/sweetalert2@11.js') }}"></script>

    @include('components.popups.sweetalert2')
@endpush

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Cabang</h4>
                    <a class="btn btn-primary btn-round ms-auto" href="{{ route('administrator.companies.branches.create', $company->id) }}">
                        <i class="fa fa-plus"></i>
                        Buat Cabang
                    </a>
                </div>
            </div>
            <div class="card-body">
                @include('administratormodule::companies.branches.table')
            </div>
        </div>
    </div>
</div>

@include('components.resources.assets.v1.simple_modal_destroy')

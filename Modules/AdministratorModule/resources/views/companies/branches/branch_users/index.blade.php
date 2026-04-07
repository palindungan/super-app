@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/plugin/datatables/dataTables.bootstrap5.min.css') }}" />
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/plugin/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/datatables/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/sweetalert2/sweetalert2@11.js') }}"></script>

    @include('components.popups.sweetalert2')
@endpush

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Daftar Pengguna Cabang {{ $branch->name }}</h4>
                <button class="btn btn-primary btn-round ms-auto" onclick="createAction()">
                    <i class="fa fa-plus"></i>
                    Tambah Pengguna ke Cabang
                </button>
            </div>
        </div>
        <div class="card-body">
            @include('administratormodule::companies.branches.branch_users.table')
        </div>
    </div>
</div>

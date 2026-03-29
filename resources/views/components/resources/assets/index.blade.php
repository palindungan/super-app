@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/plugin/datatables/dataTables.bootstrap5.min.css') }}" />
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/plugin/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/datatables/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/sweetalert2/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('components/layouts/master_1/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}">
    </script>

    @include('components.popups.sweetalert2')
    @include('components.notifications.bootstrap_notify')
@endpush

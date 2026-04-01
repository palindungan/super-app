@push('styles')
    <link href="{{ asset('assets/css/plugin/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="{{ asset('components/layouts/master_1/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}">
    </script>
    @include('components.notifications.bootstrap_notify')

    <script src="{{ asset('assets/js/plugin/select2/select2.min.js') }}"></script>
@endpush

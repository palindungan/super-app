@push('styles')
    <link href="{{ asset('assets/css/plugin/select2/select2.min.css') }}" rel="stylesheet" />
    <style>
        .select2-container .select2-selection--single {
            height: 39px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 39px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 39px;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('components/layouts/master_1/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}">
    </script>
    @include('components.notifications.bootstrap_notify')

    <script src="{{ asset('assets/js/plugin/select2/select2.min.js') }}"></script>
@endpush

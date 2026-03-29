@push('scripts')
    <script>
        function createAction() {
            const $form = $('#fields_form');

            formReset($form);

            // Show modal
            $('#fields_modal').modal('show');
        }
    </script>
@endpush

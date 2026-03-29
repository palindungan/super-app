@push('scripts')
    <script>
        function createAction() {
            const $form = $('#fields_form');

            // Reset form
            $form[0].reset();

            // Reset error
            $form.find('.has-error').removeClass('has-error has-feedback');
            $form.find('.text-danger').text('');

            // Show modal
            $('#fields_modal').modal('show');
        }
    </script>
@endpush

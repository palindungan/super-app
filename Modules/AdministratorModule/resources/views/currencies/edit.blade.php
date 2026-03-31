@push('scripts')
    <script>
        async function editAction(url) {
            const $form = $('#fields_form');
            formReset($form);

            validationErrorsReset();

            try {
                const response = await showApi(url);
                editInput(response);

                $('#fields_modal').modal('show');
            } catch (error) {
                notifyOnError(error);
            }
        }

        function editInput(response) {
            const data = response.data;
            $.each(data, function(key, value) {
                const $checkbox = $('input[type="checkbox"][name="' + key + '"]');
                if ($checkbox.length) {
                    $checkbox.prop('checked', value == 1 || value === true);
                } else {
                    $('[name="' + key + '"]').val(value);
                }
            });
        }
    </script>
@endpush

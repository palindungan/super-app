@push('scripts')
    <script>
        function createAction() {
            const $form = $('#fields_form');
            formReset($form);

            validationErrorsReset();

            $('#fields_modal').modal('show');
        }

        function createOnSubmit() {
            const $btn = $('#store_button');
            buttonLoading($btn);

            createApi();
        }

        function createApi() {
            const url = `{{ route('administrator-currencies.store') }}`;
            $.ajax({
                url: url,
                type: "POST",
                data: $('#fields_form').serialize(),
                success: function(response) {
                    $('#fields_modal').modal('hide');

                    const $form = $('#fields_form');
                    formReset($form);

                    $('[name="_token_form"]').val(response.data._token_form);

                    notifyOnSuccess(response);
                },
                error: function(xhr) {
                    notifyOnError(xhr);

                    if (xhr?.responseJSON?.errors) {
                        validationErrorsShow(xhr?.responseJSON?.errors);
                    }
                },
                complete: function() {
                    const $btn = $('#store_button');
                    buttonReset($btn, 'Buat');
                }
            });
        }
    </script>
@endpush

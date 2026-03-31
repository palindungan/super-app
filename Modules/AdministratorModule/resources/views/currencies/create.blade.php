@push('scripts')
    <script>
        function createAction() {
            createShow();
            editHide();

            const $form = $('#fields_form');
            formReset($form);

            validationErrorsReset();

            $('#fields_modal').modal('show');
        }

        function createOnSubmit() {
            const $btn = $('#store_button');
            buttonLoading($btn);

            storeApi();
        }

        function createHide() {
            $('#create_title').hide();
            $('#store_button').hide();
        }

        function createShow() {
            $('#create_title').show();
            $('#store_button').show();
        }
    </script>

    <script>
        function storeApi() {
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

                    // reload datatable tanpa reset pagination
                    datatable.ajax.reload(null, false);
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

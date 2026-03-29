@push('scripts')
    <script>
        function createAction() {
            const $form = $('#fields_form');
            formReset($form);

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
                success: function(res) {
                    $('#fields_modal').modal('hide');

                    const $form = $('#fields_form');
                    formReset($form);

                    $('[name="_token_form"]').val(res.data._token_form);

                    notifyOnSuccess(res);
                },
                error: function(err) {
                    notifyOnError(err);
                },
                complete: function() {
                    const $btn = $('#store_button');
                    buttonReset($btn, 'Buat');
                }
            });
        }
    </script>
@endpush

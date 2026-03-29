@push('scripts')
    <script>
        function createAction() {
            const $form = $('#fields_form');

            formReset($form);

            $('#fields_modal').modal('show');
        }

        function createOnSubmit(e) {
            createApi();
        }

        function createApi() {
            const url = `{{ route('administrator-roles.store') }}`;
            $.ajax({
                url: url,
                type: "POST",
                data: $('#fields_form').serialize(),
                success: function(res) {
                    notifyOnSuccess(res);
                },
                error: function(err) {
                    notifyOnError(err);
                }
            });
        }
    </script>
@endpush

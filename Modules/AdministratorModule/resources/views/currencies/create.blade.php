@push('scripts')
    <script>
        function createAction() {
            const $form = $('#fields_form');

            formReset($form);

            // Show modal
            $('#fields_modal').modal('show');
        }

        function createOnSubmit(e) {
            // createApi();
        }

        function createApi() {
            url = "";

            $.ajax({
                url: url,
                type: "POST",
                data: {

                },
                success: function(res) {
                    // 
                },
                error: function(err) {
                    // 
                }
            });
        }
    </script>
@endpush

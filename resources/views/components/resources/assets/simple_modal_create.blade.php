@push('scripts')
    <script>
        function createAction($form, $modal) {
            createShow($form);

            editHide($form);

            formReset($form);

            validationErrorsReset($form);

            $modal.modal('show');
        }

        function createOnSubmit($form, $modal) {
            const $btn = $form.find('#store_button');
            buttonLoading($btn);

            storeApi($form, $modal);
        }

        function createHide($form) {
            let $createTitle = $form.find('#create_title');
            let $storeButton = $form.find('#store_button');

            $createTitle.hide();
            $storeButton.hide();
        }

        function createShow($form) {
            let $createTitle = $form.find('#create_title');
            let $storeButton = $form.find('#store_button');

            $createTitle.show();
            $storeButton.show();
        }
    </script>

    <script>
        function storeApi($form, $modal) {
            swalShowLoading("Membuat data...", "Mohon tunggu");

            let form0 = $form[0];
            let formData = new FormData(form0);

            const url = `{{ $url }}`;
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $modal.modal('hide');

                    formReset($form);

                    $form.find('[name="_token_form"]').val(response.data._token_form);

                    notifyOnSuccess(response);

                    // reload datatable tanpa reset pagination
                    datatable.ajax.reload(null, false);
                },
                error: function(xhr) {
                    notifyOnError(xhr);

                    if (xhr?.responseJSON?.errors) {
                        validationErrorsShow($form, xhr?.responseJSON?.errors);
                    }
                },
                complete: function() {
                    const $btn = $form.find('#store_button');
                    buttonReset($btn, 'Buat');

                    setTimeout(function() {
                        Swal.close();
                    }, 500);
                }
            });
        }
    </script>
@endpush

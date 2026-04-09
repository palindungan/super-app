@push('scripts')
    <script>
        async function editAction($form, $modal, url) {
            swalShowLoading("Memuat data...", "Mohon tunggu");

            editShow($form, url);

            createHide($form);

            formReset($form);

            validationErrorsReset($form);

            try {
                const response = await showApi(url);
                editInput($form, response);

                $modal.modal('show');
            } catch (error) {
                notifyOnError(error);
            }

            setTimeout(function() {
                Swal.close();
            }, 500);
        }

        function editOnSubmit($form, $modal, button) {
            const $btn = $form.find('#update_button');
            buttonLoading($btn);

            let url = $(button).attr('data-url');
            updateApi($form, $modal, url);
        }

        function editHide($form) {
            let $editTitle = $form.find('#edit_title');
            let $updateButton = $form.find('#update_button');

            $editTitle.hide();
            $updateButton.hide();

            $updateButton.attr('data-url', '');
        }

        function editShow($form, url) {
            let $editTitle = $form.find('#edit_title');
            let $updateButton = $form.find('#update_button');

            $editTitle.show();
            $updateButton.show();

            $updateButton.attr('data-url', url);
        }
    </script>

    <script>
        function updateApi($form, $modal, url) {
            swalShowLoading("Mengubah data...", "Mohon tunggu");

            let form0 = $form[0];
            let formData = new FormData(form0);

            $.ajax({
                url: url,
                type: "PUT",
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
                    const $btn = $form.find('#update_button');
                    buttonReset($btn, 'Ubah');

                    setTimeout(function() {
                        Swal.close();
                    }, 500);
                }
            });
        }
    </script>
@endpush

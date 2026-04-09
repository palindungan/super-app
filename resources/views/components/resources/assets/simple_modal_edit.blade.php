@push('scripts')
    <script>
        async function editAction(url) {
            swalShowLoading("Memuat data...", "Mohon tunggu");

            editShow(url);
            createHide($form);

            const $form = $('#fields_form');
            formReset($form);

            validationErrorsReset($form);

            try {
                const response = await showApi(url);
                editInput(response);

                $('#fields_modal').modal('show');
            } catch (error) {
                notifyOnError(error);
            }

            setTimeout(function() {
                Swal.close();
            }, 500);
        }

        function editOnSubmit(button) {
            let url = $(button).attr('data-url');

            const $btn = $('#update_button');
            buttonLoading($btn);

            updateApi(url);
        }

        function editHide($form) {
            let $editTitle = $form.find('#edit_title');
            let $updateButton = $form.find('#update_button');

            $editTitle.hide();
            $updateButton.hide();

            $updateButton.attr('data-url', '');
        }

        function editShow(url) {
            $('#edit_title').show();
            $('#update_button').show();

            $('#update_button').attr('data-url', url);
        }
    </script>

    <script>
        function updateApi(url) {
            swalShowLoading("Mengubah data...", "Mohon tunggu");

            let form = $('#fields_form')[0];
            let formData = new FormData(form);

            $.ajax({
                url: url,
                type: "PUT",
                data: formData,
                processData: false,
                contentType: false,
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
                        validationErrorsShow($form, xhr?.responseJSON?.errors);
                    }
                },
                complete: function() {
                    const $btn = $('#update_button');
                    buttonReset($btn, 'Ubah');

                    setTimeout(function() {
                        Swal.close();
                    }, 500);
                }
            });
        }
    </script>

    <script>
        function editInput(response) {
            const data = response.data;
            $.each(data, function(key, value) {
                const $field = $('[name="' + key + '"]');

                if (!$field.length) return;

                // jika input type file jangan diisi
                if ($field.attr('type') === 'file') {
                    return;
                }

                if ($field.attr('type') === 'checkbox') {
                    $field.prop('checked', value == 1 || value === true);
                } else {
                    $field.val(value);
                }
            });

            editTitleData(data);
        }
    </script>
@endpush

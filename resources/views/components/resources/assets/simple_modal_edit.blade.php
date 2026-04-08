@push('scripts')
    <script>
        async function editAction(url) {
            swalShowLoading("Memuat data...", "Mohon tunggu");

            editShow(url);
            createHide();

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

        function editHide() {
            $('#edit_title').hide();
            $('#update_button').hide();

            $('#update_button').attr('data-url', '');
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
                        validationErrorsShow(xhr?.responseJSON?.errors);
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
                const $checkbox = $('input[type="checkbox"][name="' + key + '"]');
                if ($checkbox.length) {
                    $checkbox.prop('checked', value == 1 || value === true);
                } else {
                    $('[name="' + key + '"]').val(value);
                }
            });

            editTitleData(data);
        }
    </script>
@endpush

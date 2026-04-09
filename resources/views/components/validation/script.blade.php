<script>
    function validationErrorsShow($form, errors) {
        validationErrorsReset($form);

        $.each(errors, function(field, messages) {
            $form.find('#' + field + '_group').addClass('has-error has-feedback');
            $form.find('#' + field + '_error').html(messages[0]);
        });
    }

    function validationErrorsReset($form) {
        $form.find('.form-group, .form-check').removeClass('has-error has-feedback');
        $form.find('.text-danger').html('');
    }
</script>

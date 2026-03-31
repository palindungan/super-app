<script>
    function validationErrorsShow(errors) {
        validationErrorsReset();

        $.each(errors, function(field, messages) {
            $('#' + field + '_group').addClass('has-error has-feedback');
            $('#' + field + '_error').html(messages[0]);
        });
    }

    function validationErrorsReset() {
        $('.form-group, .form-check').removeClass('has-error has-feedback');
        $('.text-danger').html('');
    }
</script>

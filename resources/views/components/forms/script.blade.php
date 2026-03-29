<script>
    function formOnSubmitButton(form) {
        const button = form.querySelector('button[type="submit"]');
        if (button) {
            button.disabled = true;
            button.innerHTML = `
                <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                <span role="status">Memuat...</span>
            `;
        }
    }

    function formReset($form) {
        // Reset form
        $form[0].reset();

        // Reset error
        $form.find('.has-error').removeClass('has-error has-feedback');
        $form.find('.text-danger').text('');
    }
</script>

<script>
    function formOnSubmitButton(form) {
        const button = form.querySelector('button[type="submit"]');
        if (button) {
            button.disabled = true;
            button.innerHTML = 'Memuat...';
        }
    }
</script>

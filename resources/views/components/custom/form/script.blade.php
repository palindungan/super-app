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
</script>

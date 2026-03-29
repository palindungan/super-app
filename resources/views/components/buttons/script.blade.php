<script>
    function buttonLoading($button) {
        if ($button && $button.length) {
            $button.prop('disabled', true);
            $button.html(`
                <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                <span role="status">Memuat...</span>
            `);
        }
    }

    function buttonReset($button, html) {
        if ($button && $button.length) {
            $button.prop('disabled', false);
            $button.html(html);
        }
    }
</script>

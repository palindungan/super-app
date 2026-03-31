<script>
    function swalShowLoading(title, text) {
        Swal.fire({
            title: title,
            text: text,
            allowOutsideClick: false,
            allowEscapeKey: false,
            scrollbarPadding: false,
            didOpen: () => Swal.showLoading()
        });
    }
</script>

@push('scripts')
    <script>
        function showApi(url) {
            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    console.log("showApi");
                    console.log(response);
                },
                error: function(xhr) {
                    notifyOnError(xhr);
                }
            });
        }
    </script>
@endpush

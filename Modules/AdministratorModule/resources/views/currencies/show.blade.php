@push('scripts')
    <script>
        function showApi(url) {
            return $.ajax({
                url: url,
                type: "GET",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
    </script>
@endpush

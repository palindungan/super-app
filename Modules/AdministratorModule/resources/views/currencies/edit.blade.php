@push('scripts')
    <script>
        async function editAction(url) {
            try {
                const response = await showApi(url);
                console.log(response);
            } catch (error) {
                notifyOnError(error);
            }
        }
    </script>
@endpush

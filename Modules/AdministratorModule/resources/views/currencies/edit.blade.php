@include('components.resources.assets.simple_modal_edit')

@push('scripts')
    <script>
        function editTitleData(data) {
            $('#edit_title_data').text(data.name);
        }
    </script>
@endpush

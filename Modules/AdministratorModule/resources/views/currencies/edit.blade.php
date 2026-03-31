@include('components.resources.assets.simple_modal_edit')

@push('scripts')
    <script>
        function editInput(response) {
            const data = response.data;
            $.each(data, function(key, value) {
                const $checkbox = $('input[type="checkbox"][name="' + key + '"]');
                if ($checkbox.length) {
                    $checkbox.prop('checked', value == 1 || value === true);
                } else {
                    $('[name="' + key + '"]').val(value);
                }
            });

            $('#edit_title_data').text(data.name);
        }
    </script>
@endpush

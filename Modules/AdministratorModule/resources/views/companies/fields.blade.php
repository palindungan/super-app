@include('components.resources.assets.fields')

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group {{ $errors->has('code') ? 'has-error has-feedback' : '' }}">
                        <label for="code">Kode</label>
                        <input type="text" class="form-control form-control" autocomplete="off" id="code"
                            name="code" value="{{ old('code', $company->code ?? '') }}" />
                        @error('code')
                            <small class="form-text text-muted text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control form-control" autocomplete="off" id="name"
                            name="name" value="{{ old('name', $company->name ?? '') }}" />
                        @error('name')
                            <small class="form-text text-muted text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('default_currency_id') ? 'has-error has-feedback' : '' }}">
                        <label for="default_currency_id">Default Mata Uang</label>
                        <select class="form-control" id="default_currency_id" name="default_currency_id"></select>
                        @error('default_currency_id')
                            <small class="form-text text-muted text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('#default_currency_id').select2({
            placeholder: 'Cari Mata Uang...',
            // minimumInputLength: 1,
            ajax: {
                url: `{{ route('administrator-currencies.select2') }}`,
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function(data) {
                    return data;
                }
            }
        });
    </script>
@endpush

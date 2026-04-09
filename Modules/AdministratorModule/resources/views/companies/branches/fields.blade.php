@include('components.resources.assets.fields')

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('code') ? 'has-error has-feedback' : '' }}">
                        <label for="code">Kode</label>
                        <input type="text" class="form-control form-control" id="code" name="code"
                            value="{{ old('code', $branch->code ?? '') }}" />
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
                        <input type="text" class="form-control form-control" id="name" name="name"
                            value="{{ old('name', $branch->name ?? '') }}" />
                        @error('name')
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

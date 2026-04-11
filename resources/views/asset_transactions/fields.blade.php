@include('components.resources.assets.v1.fields')

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('code') ? 'has-error has-feedback' : '' }}">
                        <label for="code">Kode</label>
                        <input type="text" class="form-control" id="code" name="code"
                            value="{{ old('code', $asset_transaction->code ?? '') }}" />
                        @error('code')
                            <small class="form-text text-muted text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('date') ? 'has-error has-feedback' : '' }}">
                        <label for="date">Tanggal</label>
                        <input type="date" class="form-control" id="date" name="date"
                            value="{{ old('date', $asset_transaction->date ?? '') }}" />
                        @error('date')
                            <small class="form-text text-muted text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group {{ $errors->has('notes') ? 'has-error has-feedback' : '' }}">
                        <label for="notes">Keterangan</label>
                        <input type="text" class="form-control" id="notes" name="notes"
                            value="{{ old('notes', $asset_transaction->notes ?? '') }}" />
                        @error('notes')
                            <small class="form-text text-muted text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('origin_location_id') ? 'has-error has-feedback' : '' }}">
                        <label for="origin_location_id">Lokasi Awal</label>
                        <select class="form-control" id="origin_location_id" name="origin_location_id">
                            @foreach ($locations as $id => $name)
                                <option value="{{ $id }}"
                                    {{ old('origin_location_id', $asset_transaction->origin_location_id ?? '') == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @error('origin_location_id')
                            <small class="form-text text-muted text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div
                        class="form-group {{ $errors->has('destination_location_id') ? 'has-error has-feedback' : '' }}">
                        <label for="destination_location_id">Lokasi Tujuan</label>
                        <select class="form-control" id="destination_location_id" name="destination_location_id">
                            @foreach ($locations as $id => $name)
                                <option value="{{ $id }}"
                                    {{ old('destination_location_id', $asset_transaction->destination_location_id ?? '') == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @error('destination_location_id')
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

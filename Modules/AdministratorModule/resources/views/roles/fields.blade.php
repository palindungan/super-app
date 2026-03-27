<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control form-control" autocomplete="off" id="name"
                            name="name" value="{{ old('name', $role->name ?? '') }}" />
                        @error('name')
                            <small class="form-text text-muted text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('guard_name') ? 'has-error has-feedback' : '' }}">
                        <label for="guard_name">Nama Penjaga</label>
                        <input type="text" class="form-control form-control" autocomplete="off" id="guard_name"
                            name="guard_name" value="{{ old('guard_name', $role->guard_name ?? 'web') }}" />
                        @error('guard_name')
                            <small class="form-text text-muted text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="select_all"
                                name="select_all">
                            <label class="form-check-label" for="select_all">
                                Pilih Semua
                            </label>
                            <br>
                            <small class="form-text text-muted">
                                Aktifkan semua izin yang Tersedia untuk Peran ini.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-body pb-0" style="padding-top: 0px;">
            <div class="col-md-12 pb-0" style="padding: 10px;">
                <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                    @foreach ($permissions_data as $item_idx => $item)
                        @php
                            $link_active = '';
                            $aria_selected = 'false';
                            if ($item_idx == 0) {
                                $link_active = 'active';
                                $aria_selected = 'true';
                            }
                            $permissions = [];
                            foreach ($item['menu'] as $menu_idx => $menu) {
                                $permissions = array_merge($permissions, $menu['permissions']);
                            }
                        @endphp
                        @php
                            $index = "$item_idx";
                        @endphp
                        <li class="nav-item">
                            <a data-bs-toggle="pill" role="tab" class="nav-link {{ $link_active }}"
                                aria-selected="{{ $aria_selected }}" id="line-{{ $index }}-tab"
                                href="#line-{{ $index }}" aria-controls="pills-{{ $index }}">
                                {{ $item['label'] }}
                                <span class="badge badge-secondary">{{ count($permissions) }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content mt-3 mb-3" id="line-tabContent">
                    @foreach ($permissions_data as $item_idx => $item)
                        @php
                            $link_active = '';
                            if ($item_idx == 0) {
                                $link_active = 'show active';
                            }
                        @endphp
                        @php
                            $index = "$item_idx";
                        @endphp
                        <div role="tabpanel" class="tab-pane fade {{ $link_active }}" id="line-{{ $index }}"
                            aria-labelledby="line-{{ $index }}-tab" style="padding-top: 15px;">
                            @foreach ($item['menu'] as $menu_idx => $menu)
                                @php
                                    $index = "$item_idx-$menu_idx";
                                @endphp
                                <div class="accordion accordion-secondary">
                                    <div class="card">
                                        <div class="card-header" id="heading{{ $index }}"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                            aria-expanded="true" aria-controls="collapse{{ $index }}">
                                            <div class="span-title">
                                                {{ $menu['label'] }}
                                            </div>
                                            <div class="span-mode"></div>
                                        </div>
                                        <div id="collapse{{ $index }}" class="collapse show"
                                            aria-labelledby="heading{{ $index }}" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="row">
                                                    @foreach ($menu['permissions'] as $permission_idx => $permission)
                                                        @php
                                                            $index = "$item_idx-$menu_idx-$permission_idx";
                                                        @endphp
                                                        <div class="col-md-3">
                                                            <div class="form-check">
                                                                <input type="checkbox"
                                                                    class="form-check-input permissions"
                                                                    id="permissions{{ $index }}"
                                                                    name="permissions[]"
                                                                    value="{{ $permission['name'] }}"
                                                                    {{ in_array($permission['name'], $role_has_permissions) ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="permissions{{ $index }}">
                                                                    {{ $permission['label'] }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            function syncSelectAll() {
                let total = $('.permissions').length;
                let checked = $('.permissions:checked').length;

                $('#select_all').prop('checked', total === checked);
            }

            // Jalankan saat pertama load (INI YANG PENTING UNTUK EDIT)
            syncSelectAll();

            // Saat klik select_all
            $('#select_all').on('change', function() {
                $('.permissions').prop('checked', $(this).prop('checked'));
            });

            // Saat checkbox permissions berubah
            $('.permissions').on('change', function() {
                syncSelectAll();
            });
        });
    </script>
@endpush

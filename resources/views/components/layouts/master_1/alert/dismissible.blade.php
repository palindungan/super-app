@session('success')
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $value }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endsession
@session('error')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $value }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endsession
@if ($errors->any())
    @php
        $firstError = $errors->first();
        $total = $errors->count();
    @endphp
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $firstError }}
        @if ($total > 1)
            (and {{ $total - 1 }} more errors)
        @endif
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<ul class="breadcrumbs mb-3">
    <li class="nav-home">
        <a href="{{ url('/') }}">
            <i class="icon-home"></i>
        </a>
    </li>

    @foreach ($breadcrumbs as $breadcrumb)
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>

        <li class="nav-item">
            @if (isset($breadcrumb['url']))
                <a href="{{ $breadcrumb['url'] }}">
                    {{ $breadcrumb['label'] }}
                </a>
            @else
                <span>{{ $breadcrumb['label'] }}</span>
            @endif
        </li>
    @endforeach
</ul>

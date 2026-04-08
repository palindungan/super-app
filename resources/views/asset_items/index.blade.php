@extends('components.layouts.master_1.main')

@section('sidebar.asset_items.active', 'active')

@include('components.resources.assets.index')

@push('scripts')
    @include('components.validation.script')
@endpush

@section('content')

@endsection

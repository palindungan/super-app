@extends('components.layouts.master_1.main')

@section('sidebar.administrator.roles.active', 'active')

@section('content')
    <div class="page-header">
        <h3 class="fw-bold mb-3">Buat Peran</h3>
        @include('components.layouts.master_1.breadcrumb.main', [
            'breadcrumbs' => [
                ['label' => 'Peran', 'url' => route('administrator-roles.index')],
                ['label' => 'Buat'],
            ],
        ])
    </div>

    <form action="{{ route('administrator-roles.store') }}" method="POST" onsubmit="formOnSubmitButton(this)">
        @include('components.forms.data', ['method' => 'POST'])
        <div class="row">
            @include('administratormodule::roles.fields')
            <div class="col-md-12">
                <button type="submit" class="btn btn-warning">Buat</button>
                <a class="btn btn-light" href="{{ route('administrator-roles.index') }}">Batal</a>
            </div>
        </div>
    </form>
@endsection

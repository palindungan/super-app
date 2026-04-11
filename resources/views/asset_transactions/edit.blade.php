@extends('components.layouts.master_1.main')

@section('sidebar.asset_transactions.active', 'active')

@section('content')
    <div class="page-header">
        <h3 class="fw-bold mb-3">Ubah Aset Transaksi</h3>
        @include('components.layouts.master_1.breadcrumb.main', [
            'breadcrumbs' => [
                ['label' => 'Aset Transaksi', 'url' => route('asset_transactions.index')],
                [
                    'label' => $asset_transaction->name,
                    'url' => route('asset_transactions.edit', [$asset_transaction->id]),
                ],
                ['label' => 'Ubah'],
            ],
        ])
    </div>

    <form action="{{ route('asset_transactions.update', $asset_transaction->id) }}" method="POST"
        onsubmit="formOnSubmitButton(this)">
        @include('components.forms.data', ['method' => 'PUT'])
        <div class="row">
            @include('asset_transactions.fields')
            <div class="col-md-12">
                <button type="submit" class="btn btn-warning">Ubah</button>
                <a class="btn btn-light" href="{{ route('asset_transactions.index') }}">Batal</a>
            </div>
        </div>
    </form>
@endsection

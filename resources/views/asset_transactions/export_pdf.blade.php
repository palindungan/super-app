<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h2>Bukti</h2>
    <p><strong>Kode:</strong> {{ $main_data->code }}</p>
    <p><strong>Tanggal:</strong> {{ $main_data->date }}</p>
    <p><strong>Lokasi Awal:</strong> {{ $main_data->origin_location_name }}</p>
    <p><strong>Lokasi Tujuan:</strong> {{ $main_data->destination_location_name }}</p>
    <p><strong>Keterangan:</strong> {{ $main_data->notes }}</p>

    <table>
        <thead>
            <tr>
                <th>Aset</th>
                <th>Harga Beli</th>
                <th>Jumlah</th>
                <th>Nilai Aset</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @foreach ($details_data as $item)
                <tr>
                    <td>{{ $item->asset_item_name }}</td>
                    <td>Rp {{ number_format($item->purchase_price, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->quantity, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->asset_value, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <p class="total">Total: Rp {{ number_format($total, 0, ',', '.') }}</p> --}}
</body>

</html>

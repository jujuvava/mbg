<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pengeluaran</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #444;
            padding-bottom: 10px;
            mb-20;
        }

        .header h2 {
            margin: 0;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10px;
        }

        .summary {
            margin-top: 15px;
            font-weight: bold;
        }

        .photo-cell {
            width: 60px;
            height: 60px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Laporan Program Makan Bergizi Gratis</h2>
        <p>Kabupaten Ketapang - Tanggal Cetak: {{ $date }}</p>
    </div>

    <div class="summary">
        Total Porsi: {{ number_format($total_portions) }} porsi <br>
        Total Dana Terpakai: Rp {{ number_format($total_spent, 0, ',', '.') }}
    </div>

    <table>
        <thead>
            <tr>
                <th>Tgl</th>
                <th>Lokasi</th>
                <th>Menu</th>
                <th>Porsi</th>
                <th>Biaya</th>
                <th>Foto Bukti</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenditures as $exp)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($exp->date)->format('d/m/y') }}</td>
                    <td>{{ $exp->location }}</td>
                    <td>{{ $exp->menu->name }}</td>
                    <td>{{ $exp->portion_count }}</td>
                    <td class="text-right">Rp {{ number_format($exp->total_cost, 0, ',', '.') }}</td>
                    <td style="text-align: center;">
                        @if ($exp->photo)
                            <img src="{{ public_path('storage/' . $exp->photo) }}"
                                style="width: 50px; height: 50px; border-radius: 4px;">
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak otomatis melalui Sistem Manajemen Makan Bergizi Gratis</p>
    </div>
</body>

</html>

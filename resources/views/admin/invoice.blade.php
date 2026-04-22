<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $history->id }}</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 14px;
            color: #333;
            line-height: 1.6;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            background-color: #fff;
        }
        .header {
            margin-bottom: 20px;
            border-bottom: 2px solid #ed1c24; /* Red color from AutoSamsi */
            padding-bottom: 10px;
        }
        .header h1 {
            color: #ed1c24;
            margin: 0;
            text-transform: uppercase;
            font-size: 28px;
        }
        .header p {
            margin: 5px 0;
            color: #777;
        }
        .flex-container {
            width: 100%;
            margin-bottom: 30px;
        }
        .col {
            width: 50%;
            display: inline-block;
            vertical-align: top;
        }
        .section-title {
            font-weight: bold;
            text-transform: uppercase;
            font-size: 12px;
            color: #999;
            margin-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #f9f9f9;
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #eee;
            font-size: 12px;
            text-transform: uppercase;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .total-box {
            margin-top: 30px;
            text-align: right;
        }
        .total-row {
            font-size: 18px;
            font-weight: bold;
            color: #ed1c24;
        }
        .status-stamp {
            position: absolute;
            top: 150px;
            right: 50px;
            border: 4px solid #ccc;
            padding: 10px 20px;
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            transform: rotate(-15deg);
        }
        .status-lunas {
            color: #28a745;
            border-color: #28a745;
        }
        .status-pending {
            color: #dc3545;
            border-color: #dc3545;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #aaa;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="header">
            <div style="float: right; text-align: right;">
                <p><strong>No. Invoice:</strong> #INV-{{ str_pad($history->id, 5, '0', STR_PAD_LEFT) }}</p>
                <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($history->service_date)->format('d F Y') }}</p>
                <p><strong>ID Pelanggan:</strong> #{{ $history->vehicle->user->id }}</p>
            </div>
            <h1>Auto<span>Samsi</span></h1>
            <p>Bengkel Spesialis & Spareparts Premium</p>
            <p>Solo, Jawa Tengah, Indonesia | Telp: 0812-3456-789</p>
        </div>

        <div style="clear: both;"></div>

        <!-- Status Stamp -->
        <div class="status-stamp {{ $history->invoice_status == 'lunas' ? 'status-lunas' : 'status-pending' }}">
            {{ $history->invoice_status == 'lunas' ? 'SUDAH LUNAS' : 'BELUM LUNAS' }}
        </div>

        <div class="flex-container">
            <div class="col">
                <div class="section-title">Pelanggan:</div>
                <p><strong>{{ $history->vehicle->user->name }}</strong></p>
                <p>WA: {{ $history->vehicle->user->whatsapp_number }}</p>
            </div>
            <div class="col">
                <div class="section-title">Kendaraan:</div>
                <p><strong>{{ $history->vehicle->plate_number }}</strong></p>
                <p>{{ $history->vehicle->brand }} {{ $history->vehicle->model }}</p>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Deskripsi Servis</th>
                    <th>Teknisi</th>
                    <th style="text-align: right;">Biaya</th>
                </tr>
            </thead>
            <tbody>
                @foreach($history->details as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $history->technician_name ?? '-' }}</td>
                    <td style="text-align: right;">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                </tr>
                @endforeach
                
                @if($history->spareparts)
                <tr>
                    <td colspan="3" style="font-size: 12px; color: #666; background-color: #fafafa;">
                        <strong>Spareparts:</strong> {{ $history->spareparts }}
                    </td>
                </tr>
                @endif
                @if($history->notes)
                <tr>
                    <td colspan="3" style="font-size: 11px; color: #888; border-bottom: none;">
                        <strong>Catatan:</strong> {{ $history->notes }}
                    </td>
                </tr>
                @endif
            </tbody>
        </table>

        <div class="total-box">
            <p class="section-title">Total Pembayaran:</p>
            <p class="total-row">Rp {{ number_format($history->total_cost, 0, ',', '.') }}</p>
            @if($history->invoice_status == 'lunas')
                <p style="font-size: 11px; color: #28a745;">Dibayar pada: {{ \Carbon\Carbon::parse($history->paid_at)->format('d/m/Y H:i') }}</p>
            @endif
        </div>

        <div class="footer">
            <p>Terima kasih telah mempercayakan perawatan kendaraan Anda kepada AutoSamsi.</p>
            <p>Semoga puas dengan layanan kami. Hati-hati di jalan!</p>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaporBanjir | Konfirmasi Laporan</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #0b3d91, #1e88e5);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .card {
            background: #ffffff;
            width: 100%;
            max-width: 460px;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        }
        h2 { margin: 0 0 6px; color: #0b3d91; }
        .sub { margin: 0 0 22px; color: #666; font-size: 14px; }
        .row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
            font-size: 15px;
        }
        .row span:first-child { color: #666; }
        .row span:last-child { font-weight: bold; color: #222; text-align: right; }
        .badge {
            display: inline-block;
            margin-top: 18px;
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
        }
        .aman { background: #e8f5e9; color: #2e7d32; }
        .waspada { background: #fff8e1; color: #f57f17; }
        .bahaya { background: #ffebee; color: #c62828; }
        .note { margin-top: 18px; font-size: 13px; color: #888; }
        a.btn {
            display: block;
            margin-top: 22px;
            padding: 12px;
            text-align: center;
            background: #0b3d91;
            color: #ffffff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
        }
        a.btn:hover { background: #1e88e5; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Laporan Diterima</h2>
        <p class="sub">Terima kasih, laporan kamu sudah kami terima.</p>

        <div class="row">
            <span>Nama Pelapor</span>
            <span>{{ $nama }}</span>
        </div>
        <div class="row">
            <span>Lokasi Kejadian</span>
            <span>{{ $lokasi }}</span>
        </div>
        <div class="row">
            <span>Tinggi Genangan</span>
            <span>{{ $tinggi }} cm</span>
        </div>

        @if ($tinggi < 30)
            <div class="badge aman">Genangan rendah</div>
        @elseif ($tinggi < 100)
            <div class="badge waspada">Genangan sedang, waspada</div>
        @else
            <div class="badge bahaya">Genangan tinggi, bahaya</div>
        @endif

        <p class="note">Data ini hanya ditampilkan sementara dan tidak disimpan ke database.</p>

        <a href="{{ route('lapor.form') }}" class="btn">Buat Laporan Baru</a>
    </div>
</body>
</html>
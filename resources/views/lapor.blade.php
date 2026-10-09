<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaporBanjir | Form Pelaporan</title>
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
        label { display: block; margin-bottom: 6px; font-weight: bold; font-size: 14px; color: #333; }
        input {
            width: 100%;
            padding: 11px 12px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
        }
        input:focus { outline: none; border-color: #1e88e5; box-shadow: 0 0 0 3px rgba(30, 136, 229, 0.2); }
        .status {
            margin: -8px 0 18px;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
            display: none;
        }
        .aman { background: #e8f5e9; color: #2e7d32; }
        .waspada { background: #fff8e1; color: #f57f17; }
        .bahaya { background: #ffebee; color: #c62828; }
        button {
            width: 100%;
            padding: 12px;
            background: #0b3d91;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover { background: #1e88e5; }
        .error { background: #ffebee; color: #c62828; padding: 10px 14px; border-radius: 8px; margin-bottom: 16px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>LaporBanjir</h2>
        <p class="sub">Laporkan kejadian banjir di wilayah kamu ke BPBD Kabupaten Bandung.</p>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('lapor.kirim') }}" method="post">
            @csrf

            <label for="nama">Nama Pelapor</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Contoh: Ranu Adha" required>

            <label for="lokasi">Lokasi Kejadian (Kecamatan/Desa)</label>
            <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" placeholder="Contoh: Dayeuhkolot" required>

            <label for="tinggi">Tinggi Genangan Air (cm)</label>
            <input type="number" id="tinggi" name="tinggi" value="{{ old('tinggi') }}" min="0" placeholder="Contoh: 50" required>

            <div id="status" class="status"></div>

            <button type="submit">Kirim Laporan</button>
        </form>
    </div>

    <script>
        const tinggi = document.getElementById('tinggi');
        const status = document.getElementById('status');

        function cekStatus() {
            const nilai = parseFloat(tinggi.value);
            if (isNaN(nilai)) {
                status.style.display = 'none';
                return;
            }
            status.style.display = 'block';
            if (nilai < 30) {
                status.className = 'status aman';
                status.textContent = 'Genangan rendah (di bawah 30 cm)';
            } else if (nilai < 100) {
                status.className = 'status waspada';
                status.textContent = 'Genangan sedang, waspada (30 sampai 99 cm)';
            } else {
                status.className = 'status bahaya';
                status.textContent = 'Genangan tinggi, bahaya (100 cm ke atas)';
            }
        }

        tinggi.addEventListener('input', cekStatus);
        cekStatus();
    </script>
</body>
</html>
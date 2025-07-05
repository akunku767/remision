<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Result</title>
    <style>
        @page {
            margin: 0mm;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.6;
        }

        .card-container {
            width: 100%;
            margin: 0;
            padding: 0 10mm;
        }

        h2 {
            margin-top: 0;
            font-size: 24px;
            color: #000;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            text-align: justify;
        }

        .bold {
            font-weight: bold;
        }

        .header {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .header img {
            height: 4.5rem;
        }

        .footer {
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: #666;
            padding: 10px;
            border-top: 1px solid #ddd;
            margin-top: 2rem;
        }

        .line {
            border-top: 2px solid black;
            margin: 10px 0 20px;
        }

        table {
            width: 100%;
        }

        th, td {
            font-size: 14px;
        }

        th {
            border: 2px solid #000;
            text-align: center;
        }

        td {
            text-align: left;
            padding: 4px;
        }
    </style>
</head>

<body>
    <div class="card-container">
        <div class="header">
            <img src="https://remision.my.id/assets/img/Icon_Remision.png" alt="Logo">
            <div class="IsiJudul">
                <div class="bold">"Berkah Auto Garage"</div>
                <div class="bold">"REMISION"</div>
                Bengkel Mobil dan Reparasi Jalan Baru Jadi No. 103, Kota Surabaya, Jawa Timur<br>
                Tel/Fax: 031-673924212, e-mail: info@remision.my.id
            </div>
        </div>

        <div class="line"></div>

        <center>
            <b>SERTIFIKAT UJI EMISI</b>
        </center>

        <div style="text-align: right;">
            Jakarta, 25 Juni 2019
        </div>

        <table style="margin-top: 10px;">
            <tr><td>No</td><td>: {{ $number }}</td></tr>
            <tr><td>Lamp</td><td>: -</td></tr>
            <tr><td>Hal</td><td>: Laporan Uji Emisi</td></tr>
        </table>

        <p style="margin-top:3rem;">
            Yth. Kepala Dinas Perhubungan,<br>
            Kab. Sidoarjo<br>
            di Tempat<br><br>
            Sehubungan dengan telah diberlakukannya PERMEN LHK REPUBLIK INDONESIA NOMOR 8 TAHUN 2023 TENTANG
            PENERAPAN BAKU MUTU EMISI KENDARAAN BERMOTOR KATEGORI M, KATEGORI N, KATEGORI O, DAN KATEGORI L.
            Dengan ini menerangkan bahwa:
        </p>

        <table style="border: 0;">
            <tr><td>No Kendaraan</td><td>: {{ $license_plate }}</td></tr>
            <tr><td>Merk</td><td>: {{ $brand }}</td></tr>
            <tr><td>Tahun Produksi</td><td>: {{ $year }}</td></tr>
        </table>

        <p style="margin-top:2rem;">
            Telah mengikuti uji emisi pada {{ $date }} di Pelaksana Uji Emisi "REMISION", kendaraan bermotor
            tersebut memenuhi ambang batas emisi gas buang dan dinyatakan
            <b>{{ $result }}</b> dengan indeks emisi:
        </p>

        <table>
            <thead>
                <tr>
                    <th>O2</th>
                    <th>CO2</th>
                    <th>CO</th>
                    <th>HC</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align:center;">{{ $O2 }}</td>
                    <td style="text-align:center;">{{ $CO2 }}</td>
                    <td style="text-align:center;">{{ $CO }}</td>
                    <td style="text-align:center;">{{ $HC }}</td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <p>&copy; {{ date('Y') }} REMISION (Reduce Emision with IoT Solution). All rights reserved.</p>
            <p>Untuk informasi lebih lanjut, kunjungi <a href="https://remision.my.id/">website kami</a>.</p>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Result</title>
    <style>
        @page {
            margin: 0px !important;
            /* top right bottom left */
        }

        /* General styles */
        body {
            margin: 3rem 5rem !important;
            padding: 0;
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            align-items: center;
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

        /* Footer styles */
        .footer {
            width: 100%;
            max-width: 600px;
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
            background-color: #ffffff;
            padding: 10px;
            border-top: 1px solid #ddd;
            border-radius: 5px;
        }

        .line {
            border-top: 2px solid black;
            margin: 10px 0 20px;
        }

        .footer a {
            color: #e60012;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            /* rata tengah terhadap halaman */
            gap: 20px;
            /* jarak antara logo dan teks */
            margin-bottom: 1rem;
        }

        .header img {
            width: 80px;
            height: auto;
        }

        .isiJudul {
            text-align: center;
        }

        .bold {
            font-weight: bold;
            font-size: 18pt;
        }

        .tabel-emisi {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        .tabel-emisi th,
        .tabel-emisi td {
            border: 1px solid #000;
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="https://remision.my.id/assets/img/Icon_Remision.png" alt="Logo">
        <div class="isiJudul">
            <div class="bold">BERKAH AUTO GARAGE</div>
            <div class="bold">"REMISION"</div>
            <div style="font-size: 12pt">
                Bengkel Mobil dan Reparasi<br>
                Jalan Baru Jadi No. 103, Kota Surabaya, Jawa Timur<br>
                Tel/Fax: 031-673924212, e-mail: info@remision.my.id
            </div>
        </div>
    </div>

    <div class="line"></div>

    <center>
        <span style="font-size: 18pt!important">
            <b>
                SERTIFIKAT UJI EMISI
                <br>
            </b>
        </span>
    </center>
    <br>

    <div style="text-align: right;">
        Jakarta, {{ $now }}
    </div>

    <table style="margin-top: 10px;">
        <tr>
            <td>No</td>
            <td>: {{ $number }}</td>
        </tr>
        <tr>
            <td>Lamp</td>
            <td>: -</td>
        </tr>
        <tr>
            <td>Hal</td>
            <td>: Laporan Uji Emisi</td>
        </tr>
    </table>

    <p style="margin-top:3rem; margin-bottom: 0.5rem;">
        Yth. Kepala Dinas Perhubungan,<br>
        Kab. Sidoarjo<br>
        di Tempat<br><br>

    <p style="text-indent: 2em;">
        Sehubungan dengan telah diberlakukannya PERMEN LHK REPUBLIK INDONESIA NOMOR 8 TAHUN 2023 TENTANG
        PENERAPAN BAKU MUTU EMISI KENDARAAN BERMOTOR KATEGORI M, KATEGORI N, KATEGORI O, DAN KATEGORI L.
        Dengan ini menerangkan bahwa:
    </p>
    <br>
    </p>
    <table style="border: 0px">
        <tbody>
            <tr>
                <td>Tahun Produksi</td>
                <td>: {{ $year }}</td>
            </tr>
            <tr>
                <td>No Kendaraan</td>
                <td>: {{ $license_plate }}</td>
            </tr>
            <tr>
                <td>Merk</td>
                <td>: {{ $brand }}</td>
            </tr>
        </tbody>
    </table>

    <p style="margin-top:0.5rem; margin-bottom: 0.5rem;">
        Telah mengikuti uji emisi pada {{ $date }} di Pelaksana Uji Emisi "REMISION", kendaraan
        bermotor tersebut memenuhi ambang batas emisi gas buang dan dinyatakan
        <b>{{ $result }}</b> dengan indeks emisi:
    </p>

    <table class="tabel-emisi">
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
                <td>{{ $O2 }}</td>
                <td>{{ $CO2 }}</td>
                <td>{{ $CO }}</td>
                <td>{{ $HC }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer" style="margin-top: 2rem">
        <p style="margin: 0px !important;">Copyright &copy; {{ date('Y') }} REMISION (Reduce Emision with IoT
            Solution). All rights reserved.</p>
        <p style="margin: 0px !important;">Untuk informasi lebih lanjut, kunjungi <a
                href="https://remision.my.id/">website kami</a>.</p>
    </div>
</body>

</html>

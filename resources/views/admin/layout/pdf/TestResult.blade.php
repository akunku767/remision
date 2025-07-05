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
        .footer {}

        .line {
            border-top: 2px solid black;
            margin: 10px 0 10px;
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
            width: 25%
        }

        .kop-table {
            width: 100%;
            border-collapse: collapse;
        }

        .kop-table td {
            vertical-align: middle;
            text-align: center;
            padding: 0;
            margin: 0;
            border: none;
        }

        .kop-logo {
            width: 100px;
        }

        .kop-logo img {
            max-width: 80px;
            height: auto;
            display: block;
            margin: auto;
        }

        .kop-judul {
            font-family: 'Times New Roman', Times, serif;
            font-size: 10pt;
            line-height: 1.5;
        }

        .kop-judul .bold {
            font-weight: bold;
            font-size: 16pt;
        }
    </style>
</head>

<body>
    <table class="kop-table">
        <tr>
            <td class="kop-logo">
                <img src="https://remision.my.id/assets/img/Logo_Kemenhub.png" alt="Logo">
            </td>
            <td class="kop-judul">
                <div class="bold">BERKAH AUTO GARAGE</div>
                <div class="bold">"REMISION"</div>
                <div style="font-size: 14pt!important;">Bengkel Mobil dan Reparasi</div>
                <div>Jalan Baru Jadi No. 103, Kota Surabaya, Jawa Timur</div>
                <div>Tel/Fax: 031-673924212, e-mail: info@remision.my.id</div>
            </td>
            <td class="kop-logo">
                <img src="https://remision.my.id/assets/img/Icon_Remision.png" alt="Logo">
            </td>
        </tr>
    </table>


    <div class="line"></div>

    <center>
        <span style="font-size: 14pt!important">
            <b>
                SERTIFIKAT UJI EMISI
                <br>
            </b>
        </span>
    </center>

    <div style="text-align: right; margin-top:5px">
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

    <p style="margin-top:3rem; margin-bottom: 0px!important;">
        Yth. Kepala Dinas Perhubungan,<br>
        Kab. Sidoarjo<br>
        di Tempat<br>
    </p>
    <p style="text-indent: 2em; margin-top: 5px!important">
        Sehubungan dengan telah diberlakukannya PERMEN LHK REPUBLIK INDONESIA NOMOR 8 TAHUN 2023 TENTANG
        PENERAPAN BAKU MUTU EMISI KENDARAAN BERMOTOR. Dengan ini menerangkan bahwa:
    </p>
    <table style="border: 0px">
        <tbody>
            <tr>
                <td>Tahun Produksi</td>
                <td>: {{ $production_year }}</td>
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
        Telah mengikuti uji emisi pada {{ $date }} di bengkel kami, dan
        dinyatakan <b>{{ $result }}</b> ambang batas emisi gas buang dengan indeks emisi:
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
        <table style="width: 100%;">
            <tr>
                <td style="width: 60%;">&nbsp;</td>
                <td style="width: 40%; text-align: center;">
                    Hormat kami,
                </td>
            </tr>
            <tr>
                <td style="width: 60%;">&nbsp;</td>
                <td style="width: 40%; text-align: center;">
                    <img src="{{ $qrCode }}" style="max-width: 80px;">
                </td>
            </tr>
            <tr>
                <td style="width: 60%;">&nbsp;</td>
                <td style="width: 40%; text-align: center;">
                    Berkah Auto Garage
                </td>
            </tr>
        </table>

    </div>
</body>

</html>

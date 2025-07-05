<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Result</title>
    <style>
        @page {
            margin: 15mm 25mm 15mm 25mm;
            /* top right bottom left */
        }

        /* General styles */
        body {
            margin: 0px !important;
            padding: 0;
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card-container {
            width: 90%;
            max-width: 600px;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
            margin: 50px 0 0 20px;
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

        .button {
            display: inline-block;
            margin-bottom: 1rem;
            margin-top: 1rem;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #e60012;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .button:hover {
            background-color: #96000d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }

        thead th {
            background-color: #608544;
            color: #fff;
        }

        tbody tr:nth-child(odd) {
            background-color: #6085447a;
        }

        tbody tr:nth-child(even) {
            background-color: #608544ab;
        }


        .bold {
            font-weight: bold;
        }

        .header {
            text-align: center;
            align-items: center;
        }

        .header img {
            width: 80px;
            float: left;
            margin-right: 20px;
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
    </style>
</head>

<body>
    <div class="card-container">
        {{-- <center>
            <img src="https://remision.my.id/assets/img/Logo_Kemenhub.png"
                alt="Image" width="auto" style="height: 4.5rem">
            <img src="https://remision.my.id/assets/img/Logo_Remision.png" alt="Image" width="auto"
                style="height: 4.5rem; margin: 0px 5px">
        </center> --}}

        <div class="header">
            <img src="https://remision.my.id/assets/img/Icon_Remision.png" alt="Image" width="auto"
                style="height: 4.5rem; margin: 0px 5px">
            <div class="IsiJudul">
                <div class="bold">"Berkah Auto Garage" </div>
                <div class="bold">"REMISION" </div>
                Bengkel Mobil dan Reparasi
                Jalan Baru Jadi No. 103, Kota Surabaya, Jawa Timur<br>
                Tel/Fax: 031-673924212, e-mail: info@remision.my.id
            </div>
        </div>

        <div class="line"></div>

        <center>
            <span>
                <b>
                    SERTIFIKAT <br> UJI EMISI
                </b>
            </span>
        </center>

        <div style="text-align: right;">
            Jakarta, 25 Juni 2019
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

            Sehubungan dengan telah diberlakukannya PERMEN LHK REPUBLIK INDONESIA NOMOR 8 TAHUN 2023 TENTANG
            PENERAPAN BAKU MUTU EMISI KENDARAAN BERMOTOR KATEGORI M, KATEGORI N, KATEGORI O, DAN KATEGORI L.
            Dengan ini menerangkan bahwa: <br>
        </p>
        <table style="border: 0px">
            <tbody>
                <tr>
                    <td>No Kendaraan</td>
                    <td>: {{ $license_plate }}</td>
                </tr>
                <tr>
                    <td>Merk</td>
                    <td>: {{ $brand }}</td>
                </tr>
                <tr>
                    <td>Tahun Produksi</td>
                    <td>: {{ $year }}</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: {{ $date }}</td>
                </tr>
            </tbody>
        </table>

        <p style="margin-top:2rem; margin-bottom: 0.5rem;">
            Telah mengikuti uji emisi di Pelaksana Uji Emisi "REMISION", kendaraan
            bermotor tersebut memenuhi ambang batas emisi gas buang dan dinyatakan
            <b>{{ $result }}</b> dengan indeks emisi:
        </p>
        <table>
            <thead>
                <tr>
                    <th style="text-align: center; border: 2px solid">
                        O2
                    </th>
                    <th style="text-align: center; border: 2px solid">
                        CO2
                    </th>
                    <th style="text-align: center; border: 2px solid">
                        CO
                    </th>
                    <th style="text-align: center; border: 2px solid">
                        HC
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="25%" style="text-align: center; border: 2px solid #fff">{{ $O2 }}</td>
                    <td width="25%" style="text-align: center; border: 2px solid #fff">{{ $CO2 }}</td>
                    <td width="25%" style="text-align: center; border: 2px solid #fff">{{ $CO }}</td>
                    <td width="25%" style="text-align: center; border: 2px solid #fff">{{ $HC }}</td>
                </tr>
            </tbody>
        </table>

        <div class="footer" style="margin-top: 2rem">
            <p style="margin: 0px !important;">Copyright &copy; {{ date('Y') }} REMISION (Reduce Emision with IoT
                Solution). All rights reserved.</p>
            <p style="margin: 0px !important;">Untuk informasi lebih lanjut, kunjungi <a
                    href="https://remision.my.id/">website kami</a>.</p>
        </div>
    </div>


</body>

</html>

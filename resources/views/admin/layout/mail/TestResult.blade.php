<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Result</title>
    <style>
        @page {
            margin: 0 !important;
        }

        body {
            margin: 3rem 5rem !important;
            padding: 0;
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            text-align: justify;
        }

        .line {
            border-top: 2px solid black;
            margin: 10px 0;
        }

        .footer {
            margin-top: 2rem;
            width: 100%;
        }

        .footer table {
            width: 100%;
        }

        .footer td {
            text-align: center;
        }

        .footer img {
            max-width: 80px;
        }
    </style>
</head>

<body>
    <center>
        <img src="https://remision.my.id/assets/img/Logo_Remision.png" style="max-height: 40px;">
    </center>

    <p style="margin-top:4rem; margin-bottom: 0;">
        Yth. Pemilik kendaraan,<br>
        {{ $brand }} ({{ $license_plate }})<br>
        di Tempat<br>
    </p>

    <p style="text-indent: 2em; margin-top: 5px;">
        Terima kasih telah setia mempercayai REMISION sebagai partner uji emisi kendaraan Anda.
        Kontribusi Anda berarti bagi negeri, untuk menciptakan lingkungan udara yang bersih untuk kita tinggali.
        Bersama ini kami lampirkan hasil tes emisi kendaraan Anda pada tanggal {{ $date }}.
    </p>

    <div class="footer">
        <table>
            <tr>
                <td style="width: 60%;">&nbsp;</td>
                <td style="width: 40%;">Hormat kami,</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><img src="{{ $qrCode }}"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Berkah Auto Garage</td>
            </tr>
        </table>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stone Purchase Template</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @page { margin: 15px; }
        * { box-sizing: border-box; }
        body{
            margin-left: 30px;
            margin-right: 30px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .header{
            font-weight: 900;
        }
        .page-break {
            page-break-after: always;
        }
        .serif {
            font-family: "Times New Roman", Times, serif;
        }
        .sansserif {
            font-family: Arial, Helvetica, sans-serif;
        }
        .page-break {
            page-break-after: always;
        }

    </style>
</head>
<body>
  
    <table style="width: 100%; border-collapse: collapse; ">
        <tr>
            <td style="width: 5%; text-align: center;">{!! DNS2D::getBarcodeHTML(route('stone-purchase-data.index') , 'QRCODE', 3,3) !!}</td>
            <td style="width: 5%; text-align: center;"><img src="{{ public_path('images/logo_dsgm.jpg') }}" style="width: 120px; margin-left: 30%;"></td>
            <td style="width: 70%; text-align: center;">
                <p style="font-size: 14px; font-weight: 900;  letter-spacing: 0.3px; margin: 0; text-align: right;">Tanggal :</p>
                <p style="font-size: 20px; font-weight: 900;  letter-spacing: 0.3px; margin: 0;">FORM PENERIMAAN BATU</p>
                <p style="font-size: 20px; font-weight: 900;  letter-spacing: 0.3px; margin: 0;">PT. DWI SELO GIRI MAS</p>
            </td>
            <td style="width: 30%; text-align: center;"></td>
        </tr>
    </table>
    <hr style="color: #2958a6; margin-bottom: 0px; border-top: 1px solid #2958a6;">
    <hr style="color: #ed3338; margin-top: 2px; border-top: 1px solid #ed3338;">

    <table style="width: 100%;border-collapse: collapse; border: 1px solid;">
        <tr style="text-align: center">
            <td style="border: 1px solid; width: 5%; text-align: center; font-size: 14px;">NO</td>
            <td style="border: 1px solid; width: 20%; text-align: center; font-size: 14px;">Jenis Batu</td>
            <td style="border: 1px solid; width: 15%; text-align: center; font-size: 14px;">Supplier</td>
            <td style="border: 1px solid; width: 20%; text-align: center; font-size: 14px;">No. Polisi</td>
            <td style="border: 1px solid; width: 10%; text-align: center; font-size: 14px;">No. TT</td>
            <td style="border: 1px solid; width: 10%; text-align: center; font-size: 14px;">Netto</td>
            <td style="border: 1px solid; width: 10%; text-align: center; font-size: 14px;">% Potongan</td>
            <td style="border: 1px solid; width: 10%; text-align: center; font-size: 14px;">% Kelas 1</td>
            <td style="border: 1px solid; width: 30%; text-align: center; font-size: 14px;">Keterangan</td>
            <td style="border: 1px solid; width: 10%; text-align: center; font-size: 14px;">Kualitas</td>
            <td style="border: 1px solid; width: 10%; text-align: center; font-size: 14px;">Lokasi Simpan</td>
        </tr>
        @for ($i=0; $i<=27; $i++)
            <tr style="text-align: center">
                <td style="border: 1px solid; width: 5%; height:40px;text-align: center; font-size: 14px;">{{ $i+1 }}</td>
                <td style="border: 1px solid; width: 20%; height:40px;text-align: center; font-size: 14px;"></td>
                <td style="border: 1px solid; width: 15%; height:40px;text-align: center; font-size: 14px;"></td>
                <td style="border: 1px solid; width: 10%; height:40px;text-align: center; font-size: 14px;"></td>
                <td style="border: 1px solid; width: 10%; height:40px;text-align: center; font-size: 14px;"></td>
                <td style="border: 1px solid; width: 10%; height:40px;text-align: center; font-size: 14px;"></td>
                <td style="border: 1px solid; width: 10%; height:40px;text-align: center; font-size: 14px;"></td>
                <td style="border: 1px solid; width: 10%; height:40px;text-align: center; font-size: 14px;"></td>
                <td style="border: 1px solid; width: 30%; height:40px;text-align: center; font-size: 14px;"></td>
                <td style="border: 1px solid; width: 10%; height:40px;text-align: center; font-size: 14px;"></td>
                <td style="border: 1px solid; width: 10%; height:40px;text-align: center; font-size: 14px;"></td>
            </tr>
        @endfor
    </table>
    <br>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Offering Letter</title>
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
  
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="width: 20%; text-align: center;"><img src="{{ public_path('images/logo_dsgm.jpg') }}" style="width: 120px; margin-left: 30%;"></td>
            <td style="width: 70%; text-align: center;">
                <p style="font-size: 20px; font-weight: 900; color: #2958a6; letter-spacing: 0.3px; margin: 0;">PT. DWI SELO GIRI MAS</p>
                <p style="font-size: 14px; font-weight: 900; color: #2958a6; letter-spacing: 0.3px; margin: 0;">JL. RAYA TEBEL NO. 50</p>
                <p style="font-size: 14px; font-weight: 900; color: #2958a6; letter-spacing: 0.3px; margin: 0;">GEDANGAN - SIDOARJO</p>
                <p style="font-size: 14px; font-weight: 900; color: #2958a6; letter-spacing: 0.3px; margin: 0;">TELP. (031) 8913030, 8912469, 8913051 &nbsp; FAX. 893052</p>
                <p style="font-size: 14px; font-weight: 900; color: #2958a6; letter-spacing: 0.3px; margin: 0;">HP / WA. 0888 320 5551 &nbsp; &nbsp; E-mail : sales@dwiselogirimas.com</p>
                <p style="font-size: 14px; font-weight: 900; color: #2958a6; letter-spacing: 0.3px; margin: 0;">Web : https://www.dwiselogirimas.com</p>
            </td>
            <td style="width: 10%; text-align: center;"></td>
        </tr>
    </table>
    <hr style="color: #2958a6; margin-bottom: 0px; border-top: 1px solid #2958a6;">
    <hr style="color: #ed3338; margin-top: 2px; border-top: 1px solid #ed3338;">
    <table style="width: 100%;border-collapse: collapse;">
        <tr>
            <td style="width: 10%; text-align: left;"></td>
            <td style="width: 80%; text-align: left; font-size: 14px;">Sidoarjo, {{ $date }}</td>
            <td style="width: 10%; text-align: left;"></td>
        </tr>
    </table>
    <br><br>
    <table style="width: 100%;border-collapse: collapse;">
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
            <td style="width: 5%; text-align: left; font-size: 14px;">Nomor</td>
            <td style="width: 5%; text-align: right; font-size: 14px;">:</td>
            <td style="width: 80%; text-align: left; font-size: 14px;">{{ $code }}</td>
        </tr>
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
            <td style="width: 5%; text-align: left; font-size: 14px;">Lampiran</td>
            <td style="width: 5%; text-align: right; font-size: 14px;">:</td>
            <td style="width: 80%; text-align: left; font-size: 14px;">-</td>
        </tr>
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
            <td style="width: 5%; text-align: left; font-size: 14px;">Hal</td>
            <td style="width: 5%; text-align: right; font-size: 14px;">:</td>
            <td style="width: 80%; text-align: left; font-size: 14px;">Perkenalan Perusahaan</td>
        </tr>
    </table>
    <br>
    <table style="width: 100%;border-collapse: collapse;">
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
            <td style="width: 50%; text-align: left; font-size: 14px;">Kepada Yth,</td>
            <td style="width: 40%; text-align: left; font-size: 14px;"></td>
        </tr>
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
            <td style="width: 50%; text-align: left; font-size: 14px;">{{ $data->company }}</td>
            <td style="width: 40%; text-align: left; font-size: 14px;"></td>
        </tr>
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
            <td style="width: 50%; text-align: left; font-size: 14px;">{{ $data->city }}</td>
            <td style="width: 40%; text-align: left; font-size: 14px;"></td>
        </tr>
       
    </table>
    <br>
    <table style="width: 100%;border-collapse: collapse;">
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
            <td style="width: 5%; text-align: left; font-size: 14px;">UP</td>
            <td style="width: 5%; text-align: right; font-size: 14px;">:</td>
            <td style="width: 80%; text-align: left; font-size: 14px;">{{ $data->pic }}</td>
        </tr>
    </table>
    <br><br>
    <table style="width: 100%;border-collapse: collapse;">
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
            <td style="width: 80%; text-align: left; font-size: 14px;">Dengan hormat,</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
    </table>
    <br>
    <table style="width: 100%;border-collapse: collapse;">
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
            <td style="width: 80%; text-align: justify; font-size: 14px;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                Dengan surat ini, izinkan kami memperkenalkan perusahaan kami kepada Bapak/Ibu. 
                Nama perusahaan kamu adalah PT. Dwi Seli Giri Mas yang beralamat di JL. Raya Tebel No. 50, Sidoarjo. 
                Perusahaan kami bergerak dalam bidang industri kalsium karbonat powder.
                Kami ingin menawarkan produk kami untuk dijual / digunakan di fasilitas Bapak / Ibu. Adapun kegunaan produk kami biasa digunakan sebagai berikut:</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
    </table>
    <br>
    <table style="width: 100%;border-collapse: collapse;">
        <tr>
            <td style="width: 12%; text-align: left; font-size: 14px;"></td>
            <td style="width: 5%; text-align: center; font-size: 14px;">-</td>
            <td style="width: 73%; text-align: justify; font-size: 14px;">Bahan bangunan (pengeras beton, acian, dll)</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
        <tr>
            <td style="width: 12%; text-align: left; font-size: 14px;"></td>
            <td style="width: 5%; text-align: center; font-size: 14px;">-</td>
            <td style="width: 73%; text-align: justify; font-size: 14px;">Bahan perekat (industri semen, bahan mortar, sol sepatu dll)</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
        <tr>
            <td style="width: 12%; text-align: left; font-size: 14px;"></td>
            <td style="width: 5%; text-align: center; font-size: 14px;">-</td>
            <td style="width: 73%; text-align: justify; font-size: 14px;">Pelarut / solvent (insdustri cat, dll)</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
        <tr>
            <td style="width: 12%; text-align: left; font-size: 14px;"></td>
            <td style="width: 5%; text-align: center; font-size: 14px;">-</td>
            <td style="width: 73%; text-align: justify; font-size: 14px;">Fluk (pembuatan keramik, dll)</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
        <tr>
            <td style="width: 12%; text-align: left; font-size: 14px;"></td>
            <td style="width: 5%; text-align: center; font-size: 14px;">-</td>
            <td style="width: 73%; text-align: justify; font-size: 14px;">Untuk netralisasi (water treatment, dll)</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
        <tr>
            <td style="width: 12%; text-align: left; font-size: 14px;"></td>
            <td style="width: 5%; text-align: center; font-size: 14px;">-</td>
            <td style="width: 73%; text-align: justify; font-size: 14px;">Ban dalam</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
        <tr>
            <td style="width: 12%; text-align: left; font-size: 14px;"></td>
            <td style="width: 5%; text-align: center; font-size: 14px;">-</td>
            <td style="width: 73%; text-align: justify; font-size: 14px;">Pvc</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
        <tr>
            <td style="width: 12%; text-align: left; font-size: 14px;"></td>
            <td style="width: 5%; text-align: center; font-size: 14px;">-</td>
            <td style="width: 73%; text-align: justify; font-size: 14px;">Pupuk</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
        <tr>
            <td style="width: 12%; text-align: left; font-size: 14px;"></td>
            <td style="width: 5%; text-align: center; font-size: 14px;">-</td>
            <td style="width: 73%; text-align: justify; font-size: 14px;">Bahan baku industri kertas</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
        <tr>
            <td style="width: 12%; text-align: left; font-size: 14px;"></td>
            <td style="width: 5%; text-align: center; font-size: 14px;">-</td>
            <td style="width: 73%; text-align: justify; font-size: 14px;">Dan lain-lain</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
    </table>
    <br>
    <table style="width: 100%;border-collapse: collapse;">
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
            <td style="width: 80%; text-align: justify; font-size: 14px;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Demikian isi surat penawaran produk ini kami sampaikan. Atas perhatian dan kerjasamanya kami ucapkan terima kasih.</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
    </table>
    <br>
    <table style="width: 100%;border-collapse: collapse;">
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
            <td style="width: 80%; text-align: left; font-size: 14px;">Hormat kami,</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
    </table>
    <br><br><br>
    <table style="width: 100%;border-collapse: collapse;">
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
            <td style="width: 80%; text-align: left; font-size: 14px;">( {{ auth()->user()->name }} )</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
            <td style="width: 80%; text-align: left; font-size: 14px;">{{ Auth::user()->roles->pluck('name')[0] }}</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
            <td style="width: 80%; text-align: left; font-size: 14px;">PT. Dwi Selo Giri Mas</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
            <td style="width: 80%; text-align: left; font-size: 14px;">Jl. Raya Tebel No. 50, Sidoarjo</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
            <td style="width: 80%; text-align: left; font-size: 14px;">Office : 031-8913030, 031-8912469, 031-8913052</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
            <td style="width: 80%; text-align: left; font-size: 14px;">Handphone : 0888 320 5551</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
            <td style="width: 80%; text-align: left; font-size: 14px;">Email : sales@dwiselogirimas.com</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
    </table>

    <div class="page-break"></div>

    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="width: 20%; text-align: center;"><img src="{{ public_path('images/logo_dsgm.jpg') }}" style="width: 120px; margin-left: 30%;"></td>
            <td style="width: 70%; text-align: center;">
                <p style="font-size: 20px; font-weight: 900; color: #2958a6; letter-spacing: 0.3px; margin: 0;">PT. DWI SELO GIRI MAS</p>
                <p style="font-size: 14px; font-weight: 900; color: #2958a6; letter-spacing: 0.3px; margin: 0;">JL. RAYA TEBEL NO. 50</p>
                <p style="font-size: 14px; font-weight: 900; color: #2958a6; letter-spacing: 0.3px; margin: 0;">GEDANGAN - SIDOARJO</p>
                <p style="font-size: 14px; font-weight: 900; color: #2958a6; letter-spacing: 0.3px; margin: 0;">TELP. (031) 8913030, 8912469, 8913051 &nbsp; FAX. 893052</p>
                <p style="font-size: 14px; font-weight: 900; color: #2958a6; letter-spacing: 0.3px; margin: 0;">HP / WA. 0888 320 5551 &nbsp; &nbsp; E-mail : sales@dwiselogirimas.com</p>
                <p style="font-size: 14px; font-weight: 900; color: #2958a6; letter-spacing: 0.3px; margin: 0;">Web : https://www.dwiselogirimas.com</p>
            </td>
            <td style="width: 10%; text-align: center;"></td>
        </tr>
    </table>
    <hr style="color: #2958a6; margin-bottom: 0px; border-top: 1px solid #2958a6;">
    <hr style="color: #ed3338; margin-top: 2px; border-top: 1px solid #ed3338;">

    <table style="width: 100%;border-collapse: collapse;">
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
            <td style="width: 80%; text-align: justify; font-size: 14px;">Bersama ini kami lampirkan penawaran harga PT. DWI SELO GIRI MAS sebagai berikut :</td>
            <td style="width: 10%; text-align: left; font-size: 14px;"></td>
        </tr>
    </table>
    <br>
    <table style="width: 95%;border-collapse: collapse; margin-left:20px margin-right:20px">
        <thead>
            <tr>
                {{-- <th style="width: 10%; text-align: left; font-size: 14px;"></th> --}}
                @if ($data->header_detail_1)
                    <th style="width: 20%; text-align: center; font-size: 14px; border: 1px solid; padding-bottom: 20px;">{{ $data->header_detail_1 }}</th>
                @endif
                @if ($data->header_detail_2)
                    <th style="width: 20%; text-align: center; font-size: 14px; border: 1px solid; padding-bottom: 20px;">{{ $data->header_detail_2 }}</th>
                @endif
                @if ($data->header_detail_3)
                    <th style="width: 20%; text-align: center; font-size: 14px; border: 1px solid; padding-bottom: 20px;">{{ $data->header_detail_3 }}</th>
                @endif
                @if ($data->header_detail_4)
                    <th style="width: 20%; text-align: center; font-size: 14px; border: 1px solid; padding-bottom: 20px;">{{ $data->header_detail_4 }}</th>
                @endif
                {{-- <th style="width: 10%; text-align: left; font-size: 14px;"></th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($data->offering_detail as $product)
            <tr>
                {{-- <td style="width: 10%; text-align: left; font-size: 14px;"></td> --}}
                @if ($product->description_1) 
                    <td style="width: 20%; text-align: center; font-size: 14px; border: 1px solid; padding-bottom: 20px;">{{ $product->description_1 }}</td>
                @endif
                @if ($product->description_2) 
                    <td style="width: 20%; text-align: center; font-size: 14px; border: 1px solid; padding-bottom: 20px;">{{ $product->description_2 }}</td>
                @endif
                @if ($product->description_3) 
                    <td style="width: 20%; text-align: center; font-size: 14px; border: 1px solid; padding-bottom: 20px;">{{ $product->description_3 }}</td>
                @endif
                @if ($product->description_4) 
                    <td style="width: 20%; text-align: center; font-size: 14px; border: 1px solid; padding-bottom: 20px;">{{ $product->description_4 }}</td>
                @endif
                {{-- <td style="width: 10%; text-align: left; font-size: 14px;"></td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <table style="width: 100%;border-collapse: collapse;">
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px; font-weight:bold"></td>
            <td style="width: 80%; text-align: justify; font-size: 14px; font-weight:bold">Dengan keterangan sebagai berikut :</td>
            <td style="width: 10%; text-align: left; font-size: 14px; font-weight:bold"></td>
        </tr>
    </table>
    <br>
    <table style="width: 100%;border-collapse: collapse;">
        <tr>
            <td style="width: 10%; text-align: left; font-size: 14px; font-weight:bold"></td>
            <td style="width: 80%; text-align: justify; font-size: 14px;">{!! $data->description !!}</td>
            <td style="width: 10%; text-align: left; font-size: 14px; font-weight:bold"></td>
        </tr>
    </table>
</body>
</html>
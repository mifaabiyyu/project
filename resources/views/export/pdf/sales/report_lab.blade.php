<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Laporan Hasil Lab</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @page { margin: 15px; }
        * { box-sizing: border-box; }
        body{
            margin-left: 30px;
            margin-right: 30px;
        }
        .header-comp{
            margin-top: 2px;
            margin-bottom: 0;
        }
        .header{
            font-weight: 900;
        }
        .page-break {
            page-break-after: always;
        }
        table {
            border-collapse: collapse;
            font-size: 9px;
        }
        table, th, td {
            border: 1px solid #000;
            padding: 5px;
        }
    </style>
</head>
<body>
    @php
        $page = 1;
    @endphp
    <table style="width: 100%; border-collapse: collapse; border: none; ">
        <tr style="border: none;">
            <td style="border: none; width: 5%; text-align: center;">{!! DNS2D::getBarcodeHTML(route('barcode.workOrder', base64_encode($data->get_production_planning->code)) , 'QRCODE', 3,3) !!}</td>
            <td style="border: none; width: 5%; text-align: center;"><img src="{{ public_path('images/logo_dsgm.jpg') }}" style="border: none; width: 120px; "></td>
            <td style="border: none; width: 70%; text-align: center;">
                <p style="font-size: 12px; font-weight: 900;  letter-spacing: 0.3px; margin: 0; text-align: right;">Page {{ $page }}</p>
                <p style="font-size: 14px; font-weight: 900;  letter-spacing: 0.3px; margin: 0; text-align: right;">Tanggal : {{ date('d-m-Y', strtotime($data->date)) }}</p>
                <p style="font-size: 20px; font-weight: 900; padding-right:120px; letter-spacing: 0.3px; margin: 0;">Laporan Hasil Lab</p>
                <p style="font-size: 20px; font-weight: 900; padding-right:120px; letter-spacing: 0.3px; margin: 0;">PT. DWI SELO GIRI MAS</p>
            </td>
            {{-- <td style="width: 30%; text-align: center;"></td> --}}
        </tr>
    </table>
    <hr style="color: #2958a6; margin-bottom: 0px; border-top: 1px solid #2958a6;">
    <hr style="color: #ed3338; margin-top: 2px; border-top: 1px solid #ed3338;">

    {{-- <table style="width: 100%;">
        <tr>
            <td style=" border-right: none;">Tanggal : {{ date('d-m-Y', strtotime($data->date)) }}</td>
            <td style=" border-right: none;">Referensi : {{ $data->get_production_planning != null ? $data->get_production_planning->code : '-' }}</td>
        </tr>
    </table> --}}
    <div style="text-align: center">
        <h3>Permintaan Spesifikasi</h3>
        <h4>Referensi : {{ $data->get_production_planning != null ? $data->get_production_planning->code : '-' }}</h4>
    </div>
    <table style="width: 100%;">
        <thead>
            <tr>
              <th style="text-align: center; ">Jenis Barang</th>
              <th style="text-align: center;">Product</th>
              <th style="text-align: center;" >SSA</th>
              <th style="text-align: center;" >D-50</th>
              <th style="text-align: center;" >D-98</th>
              <th style="text-align: center;" >CIE 86</th>
              <th style="text-align: center;" >ISO 2470</th>
              <th style="text-align: center;" >Residue</th>
              <th style="text-align: center;" >Moisture</th>
          </tr>
        </thead>

        <tbody>
            @foreach ($data->get_production_planning->get_detail as $item)
                <tr>
                    <th style="vertical-align : middle; text-align: center;">{{ $item->get_product->product_type }}</th>
                    <td style="vertical-align : middle; text-align: center;">{{ $item->get_product->name }}</td>
                    <td style="vertical-align : middle; text-align: center;">{{ $item->ssa }}</td>
                    <td style="vertical-align : middle; text-align: center;">{{ $item->d_50 }}</td>
                    <td style="vertical-align : middle; text-align: center;">{{ $item->d_98 }}</td>
                    <td style="vertical-align : middle; text-align: center;">{{ $item->cie_86 }}</td>
                    <td style="vertical-align : middle; text-align: center;">{{ $item->iso_2470 }}</td>
                    <td style="vertical-align : middle; text-align: center;">{{ $item->residue }}</td>
                    <td style="vertical-align : middle; text-align: center;">{{ $item->moisture }}</td>
                </tr>
            @endforeach
      </tbody>
    </table>
    <div class="page-break"></div>
    <table style="width: 100%; border-collapse: collapse; border: none; ">
        <tr style="border: none;">
            <td style="border: none; width: 5%; text-align: center;">{!! DNS2D::getBarcodeHTML(route('stone-purchase-data.index') , 'QRCODE', 3,3) !!}</td>
            <td style="border: none; width: 5%; text-align: center;"><img src="{{ public_path('images/logo_dsgm.jpg') }}" style="border: none; width: 120px; "></td>
            <td style="border: none; width: 70%; text-align: center;">
                <p style="font-size: 12px; font-weight: 900;  letter-spacing: 0.3px; margin: 0; text-align: right;">Page {{ $page+1 }}</p>
                <p style="font-size: 14px; font-weight: 900;  letter-spacing: 0.3px; margin: 0; text-align: right;">Tanggal : {{ date('d-m-Y', strtotime($data->date)) }}</p>
                <p style="font-size: 20px; font-weight: 900; padding-right:120px; letter-spacing: 0.3px; margin: 0;">Laporan Hasil Lab</p>
                <p style="font-size: 20px; font-weight: 900; padding-right:120px; letter-spacing: 0.3px; margin: 0;">PT. DWI SELO GIRI MAS</p>
            </td>
            {{-- <td style="width: 30%; text-align: center;"></td> --}}
        </tr>
    </table>
    <hr style="color: #2958a6; margin-bottom: 0px; border-top: 1px solid #2958a6;">
    <hr style="color: #ed3338; margin-top: 2px; border-top: 1px solid #ed3338;">
    <div style="text-align: center">
        <h3 style="align-items: center">HASIL LAB</h3>
    </div>
    <table style="width: 100%; font-size: 8px;">
        <thead>
            <tr>
                <th style="vertical-align : middle; text-align: center;" rowspan="2" colspan="2">Mesin</th>
                <th style="vertical-align : middle; text-align: center; width:10%;" rowspan="2">Mesh</th>
                <th style="vertical-align : middle; text-align: center; width:12%;" colspan="2">SSA</th>
                <th style="vertical-align : middle; text-align: center;" colspan="2">D-50</th>
                <th style="vertical-align : middle; text-align: center;" colspan="2">D-98</th>
                <th style="text-align: center;" colspan="2">Whiteness</th>
                <th style="vertical-align : middle; text-align: center; width:10%;" rowspan="2">Moisture</th>
                <th style="vertical-align : middle; text-align: center; width:10%;" colspan="2">Residue</th>
            </tr>
            <tr>
                <th style="vertical-align : middle; text-align: center;">Standart</th>
                <th style="vertical-align : middle; text-align: center;">Hasil</th>
                <th style="vertical-align : middle; text-align: center;">Standart</th>
                <th style="vertical-align : middle; text-align: center;">Hasil</th>
                <th style="vertical-align : middle; text-align: center;">Standart</th>
                <th style="vertical-align : middle; text-align: center;">Hasil</th>
                <th style="vertical-align : middle; text-align: center;">CIE 86</th>
                <th style="vertical-align : middle; text-align: center;">ISO 2470</th>
                <th style="vertical-align : middle; text-align: center;">Standart</th>
                <th style="vertical-align : middle; text-align: center;">Hasil</th>
            </tr>
        </thead>
  
        <tbody>
            @foreach ($arrayDetail as $arrayItem)
                @foreach ($arrayItem as $key => $item)
                    <tr>
                        @if ($key == 0)
                            <td style="vertical-align : middle; text-align: center; width: 8%;" rowspan="2" >{{ $item->get_planning_detail->get_machine->name }}</td>
                        @endif
                        <td style="vertical-align : middle; text-align: center;">{{ $item->time }}</td>
                        <td style="vertical-align : middle; text-align: center;">{{ $item->get_product->product_type }} ( {{ $item->get_product->mesh }} )</td>
                        <td style="vertical-align : middle; text-align: center;">
                            {{ $item->get_product->ssa != null ? number_format($item->get_product->ssa, 0, ".", ".") : '-' }}
                        </td>
                        <td style="vertical-align : middle; text-align: center; {{ $item->ssa >= $item->get_product->ssa ? 'background-color: #ffea8c' : '' }} ">
                            {{ $item->ssa }}
                        </td>
                        <td style="vertical-align : middle; text-align: center;">
                            {{ $item->get_product->d_50 != null ? number_format($item->get_product->d_50, 0, ".", ".") : '-' }}
                        </td>
                        <td style="vertical-align : middle; text-align: center; {{ $item->d_50 >= $item->get_product->d_50 ? 'background-color: #ffea8c' : '' }} ">
                            {{ $item->d_50  }}
                        </td>
                        <td style="vertical-align : middle; text-align: center;">
                            {{ $item->get_product->d_98 != null ? number_format($item->get_product->d_98, 0, ".", ".") : '-' }}
                        </td>
                        <td style="vertical-align : middle; text-align: center; {{ $item->d_98 >= $item->get_product->d_98 ? 'background-color: #ffea8c' : '' }} ">
                            {{ $item->d_98  }}
                        </td>
                        <td style="vertical-align : middle; text-align: center; {{ $item->cie_86 >= $item->get_product->cie_86 ? 'background-color: #ffea8c' : '' }}">
                            {{ $item->cie_86  }}
                        </td>
                        <td style="vertical-align : middle; text-align: center; {{ $item->iso_2470 >= $item->get_product->iso_2470 ? 'background-color: #ffea8c' : '' }} ">
                            {{ $item->iso_2470  }}
                        </td>
                        <td style="vertical-align : middle; text-align: center; {{ $item->moisture >= $item->get_product->moisture ? 'background-color: #ffea8c' : '' }} ">
                            {{ $item->moisture   }}
                        </td>
                        <td style="vertical-align : middle; text-align: center;">
                            {{ $item->get_product->residue != null ? number_format($item->get_product->residue, 0, ".", ".") : '-' }}
                        </td>
                        <td style="vertical-align : middle; text-align: center; {{ $item->residue >= $item->get_product->residue ? 'background-color: #ffea8c' : '' }} ">
                            {{ $item->residue   }}
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>
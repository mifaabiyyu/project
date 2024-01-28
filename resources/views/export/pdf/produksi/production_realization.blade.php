<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Realisasi Produksi</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @page { margin: 15px; }
        * { box-sizing: border-box; }
        body{
            margin-left: 10px;
            margin-right: 10px;
        }
        table {
            border-collapse: collapse;
            font-size: 14px;
        }
        table, th, td {
            text-align: center;
        }
        
        #table_data th, #table_data td {
            border: 1px solid #000;
        }

        #table_data tr{
            height:12px;
        }

        h2 {
            text-align: center; 
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <table style="width: 100%;">
        <tr>
            @if ($data->get_planning)
                <td style="border: none; width: 5%; text-align: center;"> {!! DNS2D::getBarcodeHTML(route('barcode.workOrder', base64_encode($data->get_planning->code)) , 'QRCODE', 2,2) !!}</td>
            @endif
            <td style="border: none; width: 5%; text-align: center;"><img src="{{ public_path('images/logo_dsgm.jpg') }}" style="border: none; width: 80px; "></td>
            <td style="border: none; width: 70%; text-align: center;">
                <p style="font-size: 14px; font-weight: 900;  letter-spacing: 0.3px; margin: 0; text-align: right;">Tanggal : {{ date("d-m-Y", strtotime($data->real_date));}}</p>
                <p style="font-size: 18px; font-weight: 900; padding-right:120px; letter-spacing: 0.3px; margin: 0;">Realisasi Produksi</p>
                <p style="font-size: 18px; font-weight: 900; padding-right:120px; letter-spacing: 0.3px; margin: 0;">PT. DWI SELO GIRI MAS</p>
            </td>
        </tr>
    </table>
    <hr style="color: #2958a6; margin-bottom: 0px; border-top: 1px solid #2958a6;">
    <hr style="color: #ed3338; margin-top: 2px; border-top: 1px solid #ed3338;">
       
    <table style="width: 100%;">
        <tr>
            <td width="40%"><h4 style="margin:10px;">WOS : {{ $data->code }}</h4></td>
            <td width="40%" style="text-align: left;"><h4 style="margin:10px;">Keterangan : {{ $data->description }}</h4></td>
        </tr>
    </table>
    <table id="table_data" style="width: 100%;">
        <thead>
            <tr>
                <th style="height: 40px">Machine</th>
                <th style="height: 40px">Product</th>
                <th style="height: 40px">Qty</th>
                <th style="height: 40px">Total Weight</th>
                <th style="height: 40px">Notes</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($data->get_detail as $item)
               <tr>
                    <td style="height: 20px">
                        {{ $item->get_machine->name }}
                    </td>
                    <td style="height: 20px">
                        {{ $item->get_product->name }} - {{ $item->get_product->product_type }}
                    </td>
                    <td style="height: 20px">
                        {{ $item->qty }} Sack
                    </td>
                    <td style="height: 20px">
                        {{ $item->weight / 1000 }} Ton
                    </td>
                    <td style="height: 20px">
                        {{ $item->get_customer_order != null ? $item->get_customer_order->description : '-' }}
                    </td>
               </tr>
           @endforeach
           <tr>
                <td colspan="2" style="height: 20px">
                    Total
                </td>
                <td style="height: 20px">
                    {{ $data->total_qty }} Sack
                </td>
                <td style="height: 20px">
                    {{ $data->total_weight / 1000 }} Ton
                </td>
                <td style="height: 20px">
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    {{-- <table style="width: 100%;">
        <tr>
            <td><h2 style="margin:10px; margin-bottom: 0;">SPESIFIKASI</h2></td>
        </tr>
    </table>
    <br>
    <table id="table_data" style="width: 100%;">
        <thead>
            <tr>
                <th>Nama Mesin</th>
                <th>SA</th>
                <th>SB</th>
                <th>Mixer</th>
                <th>RA</th>
                <th>RB</th>
                <th>RC</th>
                <th>RD</th>
                <th>RE</th>
                <th>RF</th>
                <th>RG</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Particle Size</td>
                <td>{{ isset($sa_spek[0]->particle_size) ? $sa_spek[0]->particle_size : '' }}</td>
                <td>{{ isset($sb_spek[0]->particle_size) ? $sb_spek[0]->particle_size : '' }}</td>
                <td>{{ isset($mixer_spek[0]->particle_size) ? $mixer_spek[0]->particle_size : '' }}</td>
                <td>{{ isset($ra_spek[0]->particle_size) ? $ra_spek[0]->particle_size : '' }}</td>
                <td>{{ isset($rb_spek[0]->particle_size) ? $rb_spek[0]->particle_size : '' }}</td>
                <td>{{ isset($rc_spek[0]->particle_size) ? $rc_spek[0]->particle_size : '' }}</td>
                <td>{{ isset($rd_spek[0]->particle_size) ? $rd_spek[0]->particle_size : '' }}</td>
                <td>{{ isset($re_spek[0]->particle_size) ? $re_spek[0]->particle_size : '' }}</td>
                <td>{{ isset($rf_spek[0]->particle_size) ? $rf_spek[0]->particle_size : '' }}</td>
                <td>{{ isset($rg_spek[0]->particle_size) ? $rg_spek[0]->particle_size : '' }}</td>
            </tr>
            <tr>
                <td>SSA</td>
                <td>{{ isset($sa_spek[0]->ssa) ? $sa_spek[0]->ssa : '' }}</td>
                <td>{{ isset($sb_spek[0]->ssa) ? $sb_spek[0]->ssa : '' }}</td>
                <td>{{ isset($mixer_spek[0]->ssa) ? $mixer_spek[0]->ssa : '' }}</td>
                <td>{{ isset($ra_spek[0]->ssa) ? $ra_spek[0]->ssa : '' }}</td>
                <td>{{ isset($rb_spek[0]->ssa) ? $rb_spek[0]->ssa : '' }}</td>
                <td>{{ isset($rc_spek[0]->ssa) ? $rc_spek[0]->ssa : '' }}</td>
                <td>{{ isset($rd_spek[0]->ssa) ? $rd_spek[0]->ssa : '' }}</td>
                <td>{{ isset($re_spek[0]->ssa) ? $re_spek[0]->ssa : '' }}</td>
                <td>{{ isset($rf_spek[0]->ssa) ? $rf_spek[0]->ssa : '' }}</td>
                <td>{{ isset($rg_spek[0]->ssa) ? $rg_spek[0]->ssa : '' }}</td>
            </tr>
            <tr>
                <td>Whiteness</td>
                <td>{{ isset($sa_spek[0]->whiteness) ? $sa_spek[0]->whiteness : '' }}</td>
                <td>{{ isset($sb_spek[0]->whiteness) ? $sb_spek[0]->whiteness : '' }}</td>
                <td>{{ isset($mixer_spek[0]->whiteness) ? $mixer_spek[0]->whiteness : '' }}</td>
                <td>{{ isset($ra_spek[0]->whiteness) ? $ra_spek[0]->whiteness : '' }}</td>
                <td>{{ isset($rb_spek[0]->whiteness) ? $rb_spek[0]->whiteness : '' }}</td>
                <td>{{ isset($rc_spek[0]->whiteness) ? $rc_spek[0]->whiteness : '' }}</td>
                <td>{{ isset($rd_spek[0]->whiteness) ? $rd_spek[0]->whiteness : '' }}</td>
                <td>{{ isset($re_spek[0]->whiteness) ? $re_spek[0]->whiteness : '' }}</td>
                <td>{{ isset($rf_spek[0]->whiteness) ? $rf_spek[0]->whiteness : '' }}</td>
                <td>{{ isset($rg_spek[0]->whiteness) ? $rg_spek[0]->whiteness : '' }}</td>
            </tr>
            <tr>
                <td>Residue</td>
                <td>{{ isset($sa_spek[0]->residue) ? $sa_spek[0]->residue : '' }}</td>
                <td>{{ isset($sb_spek[0]->residue) ? $sb_spek[0]->residue : '' }}</td>
                <td>{{ isset($mixer_spek[0]->residue) ? $mixer_spek[0]->residue : '' }}</td>
                <td>{{ isset($ra_spek[0]->residue) ? $ra_spek[0]->residue : '' }}</td>
                <td>{{ isset($rb_spek[0]->residue) ? $rb_spek[0]->residue : '' }}</td>
                <td>{{ isset($rc_spek[0]->residue) ? $rc_spek[0]->residue : '' }}</td>
                <td>{{ isset($rd_spek[0]->residue) ? $rd_spek[0]->residue : '' }}</td>
                <td>{{ isset($re_spek[0]->residue) ? $re_spek[0]->residue : '' }}</td>
                <td>{{ isset($rf_spek[0]->residue) ? $rf_spek[0]->residue : '' }}</td>
                <td>{{ isset($rg_spek[0]->residue) ? $rg_spek[0]->residue : '' }}</td>
            </tr>
            <tr>
                <td>Moisture</td>
                <td>{{ isset($sa_spek[0]->moisture) ? $sa_spek[0]->moisture : '' }}</td>
                <td>{{ isset($sb_spek[0]->moisture) ? $sb_spek[0]->moisture : '' }}</td>
                <td>{{ isset($mixer_spek[0]->moisture) ? $mixer_spek[0]->moisture : '' }}</td>
                <td>{{ isset($ra_spek[0]->moisture) ? $ra_spek[0]->moisture : '' }}</td>
                <td>{{ isset($rb_spek[0]->moisture) ? $rb_spek[0]->moisture : '' }}</td>
                <td>{{ isset($rc_spek[0]->moisture) ? $rc_spek[0]->moisture : '' }}</td>
                <td>{{ isset($rd_spek[0]->moisture) ? $rd_spek[0]->moisture : '' }}</td>
                <td>{{ isset($re_spek[0]->moisture) ? $re_spek[0]->moisture : '' }}</td>
                <td>{{ isset($rf_spek[0]->moisture) ? $rf_spek[0]->moisture : '' }}</td>
                <td>{{ isset($rg_spek[0]->moisture) ? $rg_spek[0]->moisture : '' }}</td>
            </tr>
        </tbody>
    </table> --}}
    <br>
    <table style="width: 100%; border: 1px solid #000;">
        <tr>
            <td width="33%" style="height: 100px; border-right: 1px solid #000;">&nbsp;</td>
            <td width="33%" style="height: 100px; border-right: 1px solid #000;">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-right: 1px solid #000;"><h4 style="margin:10px; margin-bottom: 0;">Mandor</h4></td>
            <td style="border-right: 1px solid #000;"><h4 style="margin:10px; margin-bottom: 0;">Kabag. Produksi</h4></td>
        </tr>
    </table>
</body>
</html>
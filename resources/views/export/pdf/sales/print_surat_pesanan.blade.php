<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Surat Pesanan</title>
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
    </style>
</head>
<body>
        <table style="width: 100%;">
            <tr>
                <td>
                    <tr>
                        <td style="font-size: 16px; font-family: 'Times New Roman'; font-weight: 900; width: 70%">PT. DWI SELO GIRI MAS</td>
                        <td style="font-size: 12px; font-weight: 0; width: 5%; text-align: right;">No. :</td>
                        <td style="font-size: 12px; font-weight: 0; width: 25%; border-bottom: 1px solid #000;">{{ $data->code }}

                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 11.5px; font-family: 'Arial'; font-weight: 900; width: 70%">JL. RAYA TEBEL NO. 50</td>
                        <td style="font-size: 12px; font-weight: 0; width: 10%; text-align: right;">Tgl. :</td>
                        <td style="font-size: 12px; font-weight: 0; width: 20%; border-bottom: 1px solid #000;">{{ date('j F Y') }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 11.5px; font-family: 'Arial'; font-weight: 900; width: 70%">TELP. (031) 8913030</td>
                    </tr>
                    <tr>
                        <td style="font-size: 11.5px; font-family: 'Arial'; font-weight: 900; width: 70%">GEDANGAN - SIDOARJO</td>
                    </tr>
                </td>
            </tr>
        </table>
        <br>
        <table style="width: 100%;">
            <tr>
                <td style="font-size: 20px; font-family: 'Times New Roman'; font-weight: 900; text-align: center; text-decoration: underline;">SURAT PESANAN</td>
            </tr>
        </table>
        <br><br>
        <table style="width: 100%;">
            <tr>
                <td style="font-size: 12px; font-weight: 0; width: 15%;">Nama Persh :</td>
                <td style="font-size: 12px; font-weight: 0; border-bottom: 1px solid #000; width: 50%;">{{ $data->get_customer->name }}</td>
                <td style="font-size: 12px; font-weight: 0; width: 12%; text-align: right;">Kd Cust :</td>
                <td style="font-size: 12px; font-weight: 0; border-bottom: 1px solid #000;">{{ $data->get_customer->code }}</td>
            </tr>
            <tr>
                <td style="font-size: 12px; font-weight: 0; width: 15%;">Alamat :</td>
                <td style="font-size: 12px; font-weight: 0; border-bottom: 1px solid #000; width: 50%;">{{ $data->address }}</td>
                <td style="font-size: 12px; font-weight: 0; width: 12%; text-align: right;">Pemesan :</td>
                <td style="font-size: 12px; font-weight: 0; border-bottom: 1px solid #000;"></td>
            </tr>
            <tr>
                <td style="font-size: 12px; font-weight: 0; width: 15%;">No. PO :</td>
                <td style="font-size: 12px; font-weight: 0; border-bottom: 1px solid #000; width: 50%;">{{ $data->purchase_order_number }}</td>
            </tr>
        </table>
        <br>
        <table style="font-size: 12px; font-weight: 0; width: 100%; text-align: center; border-collapse: collapse;">
            <tr style="">
                <td style="width: 28%; border: 1px solid #000; border-left: none;">Jenis Barang</td>
                <td style="width: 16%; border: 1px solid #000;">Tgl Kirim</td>
                <td style="width: 12%; border: 1px solid #000;">Kuantitas (KG)</td>
                <td style="width: 10%; border: 1px solid #000;">Harga (KG)</td>
                <td style="width: 15%; border: 1px solid #000; border-right: none;">Total Harga (Rp)</td>
            </tr>
            @foreach ($data->get_order_details as $item)
                <tr style="">
                    <td style="width: 20%; border-right: 1px solid #000; padding: 5px;">{{ $item->get_product->name }} [{{ $item->get_product->code }}]</td>
                    <td style="width: 15%; border-right: 1px solid #000; padding: 5px;">{{ date('j F Y', strtotime($data->delivery_date)) }}</td>
                    <td style="border-right: 1px solid #000; padding: 5px;">{{ number_format($item->qty, 0, ".", ".") }}</td>
                    <td style="border-right: 1px solid #000; padding: 5px;">{{ number_format($item->price, 0, ".", ".") }}</td>
                    <td style="width: 15%; padding: 5px;">{{ number_format($item->product_price, 0, ".", ".") }}</td>
                </tr>
            @endforeach
            <tr style="">
                <td style="width: 20%; border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;"></td>
                <td style="width: 15%; border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;"></td>
                <td style="border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;"></td>
                <td style="border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;"></td>
                <td style="width: 15%; border-bottom: 1px solid #000; padding: 5px;"></td>
            </tr>
            <tr style="">
                <td style="width: 20%;border-bottom: 1px solid #000; padding: 3px; text-align: left;">Subtotal</td>
                <td colspan="3" style="border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 3px;"></td>
                <td style="width: 15%; border-bottom: 1px solid #000; padding: 3px;">{{ number_format($data->sub_total_price, 0, ".", ".") }}</td>
            </tr>
            <tr style="">
                <td style="width: 20%;border-bottom: 1px solid #000; padding: 3px; text-align: left;">Discount ({{ $data->discount }}%)</td>
                <td colspan="3" style="border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 3px;"></td>
                <td style="width: 15%; border-bottom: 1px solid #000; padding: 3px;">{{ number_format($data->discount_price, 0, ".", ".") }}</td>
            </tr>
            <tr style="">
                <td style="width: 20%;border-bottom: 1px solid #000; padding: 3px; height: 12px; text-align: left;">PPN ({{ $data->ppn }}%)</td>
                <td colspan="3" style="border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 3px;"></td>
                <td style="width: 15%; border-bottom: 1px solid #000; padding: 3px;">{{ number_format($data->ppn_price, 0, ".", ".") }}</td>
            </tr>
            <tr style="">
                <td style="width: 20%;border-bottom: 1px solid #000; padding: 3px; height: 12px; text-align: left;">Total</td>
                <td colspan="3" style="border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 3px;"></td>
                <td style="width: 15%; border-bottom: 1px solid #000; padding: 3px;">{{ number_format($data->total_price, 0, ".", ".") }}</td>
            </tr>
        </table>
        <table style="width: 100%;">
            <tr>
                <td style="font-size: 12px; font-weight: 0; width: 16%;">Syarat Pembayaran :</td>
                <td style="font-size: 12px; font-weight: 0; border-bottom: 1px solid #000; width: 50%;">{{ $data->get_customer->credit }} Hari Tunai / Transfer</td>
            </tr>
            <tr>
                <td style="font-size: 12px; font-weight: 0; width: 16%;">Syarat Pembayaran :</td>
                <td style="font-size: 12px; font-weight: 0; border-bottom: 1px solid #000; width: 50%;">{{ $data->get_customer->credit }} Hari</td>
            </tr>
            <tr>
                <td style="font-size: 12px; font-weight: 0; width: 15%;">Barang dikirim ke :</td>
                <td style="font-size: 12px; font-weight: 0; border-bottom: 1px solid #000; width: 50%;">{{ $data->get_receive_address->address . ', ' . ucwords(strtolower($data->get_receive_address->get_city->name)) }}</td>
            </tr>
            <tr>
                <td style="font-size: 12px; font-weight: 0; width: 15%;">Keterangan Lain-lain :</td>
                <td style="font-size: 12px; font-weight: 0; border-bottom: 1px solid #000; width: 50%;">{{ $data->description }}</td>
            </tr>
        </table>
        <br>
        <table style="width: 100%; text-align: center;">
            <tr>
                <td style="font-size: 12px; font-weight: 0; width: 40%;">Pemesan :</td>
                <td style="font-size: 12px; font-weight: 0; width: 20%;"></td>
                <td style="font-size: 12px; font-weight: 0; width: 40%;">Salesman :</td>
            </tr>
            <tr>
                <td style="font-size: 12px; font-weight: 0; width: 40%; height: 50px;"></td>
                <td style="font-size: 12px; font-weight: 0; width: 20%; height: 50px;"></td>
                <td style="font-size: 12px; font-weight: 0; width: 40%; height: 50px;"></td>
            </tr>
            <tr>
                <td style="font-size: 12px; font-weight: 0; width: 40%;">(......................................)</td>
                <td style="font-size: 12px; font-weight: 0; width: 20%;"></td>
                <td style="font-size: 12px; font-weight: 0; width: 40%;">(......................................)</td>
            </tr>
        </table>
    <!-- <div class="header" style="width:100%!important">
        <div class="" style="width: 50%; float: left;">
            <p class="header-comp" style="font-size: 16px; font-family: 'Times New Roman';">PT. DWI SELO GIRI MAS</p>
            <p class="header-comp" style="font-size: 11.5px; font-family: 'Calibri';">JL. RAYA TEBEL NO. 50</p>
            <p class="header-comp" style="font-size: 11.5px;">TELP. (031) 8913030</p>
            <p class="header-comp" style="font-size: 11.5px;">GEDANGAN - SIDOARJO</p>
        </div>
        <div class="" style="width: 50%; float: left; align-content: right;">
            <table style="margin-top: 5px; float: right; font-size: 12px; font-weight: 0;">
                <tr>
                    <td width="10%">No. </td>
                    <td width="2%"> : </td>
                    <td>123456718</td>
                </tr>
                <tr>
                    <td>Tanggal. </td>
                    <td> : </td>
                    <td>2020-01-03</td>
                </tr>
            </table>
            <div style="float: right;">
                <div style="margin-top: 10px; font-size: 12px; font-weight: 0; float: left;">No. : 124571239123</div>
                <div style="margin-top: 30px; font-size: 12px; font-weight: 0; float: left;">Tgl. : 2020-01-03</div>
            </div>
        </div>
    </div> -->
</body>
</html>
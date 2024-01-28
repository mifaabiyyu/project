<?php

namespace App\Imports;

use App\Models\MasterData\Parameter;
use App\Models\MasterData\Product;
use App\Models\Sales\Customer;
use App\Models\Sales\DeliveryOrder;
use App\Models\Sales\DeliveryOrderDetail;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportOmset implements ToModel, WithStartRow, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        // dd($row);

        // $UNIX_DATE = ($row['tanggal'] - 25569) * 86400;
        
        // $newDate        = gmdate("Y-m-d", $UNIX_DATE);

        // $duedate    = $row['jthtempo'];

        // if ($row['jthtempo'] != "NULL") {
        //     $UNIX_DATE = ($row['jthtempo'] - 25569) * 86400;
            
        //     $duedate        = gmdate("Y-m-d", $UNIX_DATE);
        // }


        $findData   = DeliveryOrder::where('code', $row['nosj'])->first();
        $findPPN    = Parameter::where('code', 'ppn')->first();
        $codeCustomer = $row['custid'];
        $productCode = $row['itemid'];
        $findCustomer   = Customer::find($row['custid']);
        if (!empty($row['tanggal'])) {
            $newDate = date("Y-m-d", strtotime($row['tanggal']));
            $duedate = date("Y-m-d", strtotime($row['jthtempo']));
        } else {
            $newDate = date("Y-m-d", strtotime($row['tanggal_do']));
            $duedate = date("Y-m-d", strtotime($row['tanggal_jatuh_tempo']));
        }
        
       

        // dd($newDate);
        if ($findCustomer) {
            $codeCustomer   = $findCustomer->id;
        }

        $findProduct    = Product::where('code', $row['itemid'])->first();

        if ($findProduct) {
            $productCode   = $findProduct->id;
        }

        if ($row['noinv'] == "NULL") {
            $row['noinv']   = '-';
        }

        if ($row['top'] == "NULL") {
            $row['top']   = '-';
        }

        if (!$findData) {

            $createDelivery = DeliveryOrder::create([
                'code'                  => $row['nosj'],
                'customer_id'           => $codeCustomer,
                'customer_name'         => $row['custname'],
                'customer_order_id'     => $row['noso'],
                'invoice_number'        => $row['noinv'],
                'purchase_order_number' => $row['nopo'],
                'delivery_date'         => $newDate,
                'credit'                => $row['top'],
                'due_date'              => $duedate,
                'total_qty'             => $row['qty'],
                'total_price'           => $row['amount'],
                'total_ppn'             => $row['ppn'],
                'ppn'                   => $row['percent_ppn'],
                'total_discount'        => !empty($row['discheader']) ? $row['discheader'] : $row['diskon'],
                'sub_total'             => $row['dpp'],
                'created_by'            => auth()->id(),
                'status'                => 4 
            ]);

            $createDetail = DeliveryOrderDetail::create([
                'delivery_order_id'         => $createDelivery->id,
                'product_id'                => $productCode,
                'product_name'              => $row['itemname'],
                'price'                     => $row['price'],
                'qty'                       => $row['qty'],
                'ppn_price'                 => $row['ppn'],
                'total_price_before_ppn'    => $row['dpp'],
                'total_price'               => (int)$row['ppn'] + (int)$row['dpp'] ,
                'pkk_price'                 => $row['hrg_pkk'],
                'sub_pkk_price'             => $row['sub_pkk'],
                'g'                         => $row['g'],
                'total_pkk'                 => $row['hrg_pkk'] * $row['qty'],
            ]);
        } else {
            $getDuplicate = DeliveryOrderDetail::where('product_id', $productCode)->where('delivery_order_id', $findData->id)->first();

            if ($getDuplicate) {
                return ;
            } else {
                $totalPPN       = (int)$findData->total_ppn + (int)$row['ppn'];
                $totalQty       = (int)$findData->total_qty + (int)$row['qty'];
                $subTotal       = (int)$findData->sub_total + (int)$row['dpp'];
                $findData->update([
                    'total_qty'     => $totalQty,
                    'total_ppn'     => $totalPPN,
                    'sub_total'     => $subTotal,
                ]);
    
                $createDetail = DeliveryOrderDetail::create([
                    'delivery_order_id'         => $findData->id,
                    'product_id'                => $productCode,
                    'product_name'              => $row['itemname'],
                    'price'                     => $row['price'],
                    'qty'                       => $row['qty'],
                    'ppn_price'                 => $row['ppn'],
                    'total_price_before_ppn'    => $row['dpp'],
                    'total_price'               => $row['sub_amount'],
                    'pkk_price'                 => $row['hrg_pkk'],
                    'sub_pkk_price'             => $row['sub_pkk'],
                    'g'                         => $row['g'],
                    'total_pkk'                 => $row['hrg_pkk'] * $row['qty'],
                ]);
            }
        }
    }
}

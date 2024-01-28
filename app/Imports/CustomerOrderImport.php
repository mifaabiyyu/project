<?php

namespace App\Imports;

use App\Models\MasterData\Ekspedisi;
use App\Models\MasterData\Product;
use App\Models\Sales\Customer;
use App\Models\Sales\CustomerOrder;
use App\Models\Sales\CustomerOrderDetail;
use App\Models\Sales\CustomerReceiveAddress;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CustomerOrderImport implements ToModel, WithStartRow, WithHeadingRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        // dd($row);
        $checkCustomerOrder  = CustomerOrder::where('code', $row['nomor_order_receipt'])->first();

        if (empty($row['nomor_order_receipt_produk'])) {
            if (!$checkCustomerOrder) {
          
            
                $checkCustomer  = Customer::where('code', $row['custid'])->first();
                if ($checkCustomer) {
                    $createOrder    = CustomerOrder::create([
                        'code'                      => $row['nomor_order_receipt'],
                        'customer_id'               => $checkCustomer->id,
                        'purchase_order_number'     => $row['nomor_po'],
                        'address'                   => '-',
                        'city_id'                   => 9474,
                        'phone'                     => '-',
                        'delivery_date'             => '-',
                        'discount'                  => 0,
                        'discount_price'            => 0,
                        'ppn'                       => 0,
                        'initial_price'             => 0,
                        'ppn_price'                 => 0,
                        'sub_total_price'           => 0,
                        'total_price'               => 0,
                        'staple_price'              => 0,
                        'ekspedisi_id'              => 0,
                        'description'               => $row['keterangan_order'],
                        'created_by'                => auth()->id(),
                        'status'                    => 2,
                        'created_at'                => $row['tanggal_order'],
                        'customer_receive_address_id'   => null
                    ]);
                }
            }
        } else {
            if ($checkCustomerOrder) {
                $getAddress     = CustomerReceiveAddress::where('address', $row['custalamat_receive'])->where('pic', $row['custname_receive'])->first();
                    if ($getAddress) {
                        
                        $getDiscount    = (int)$row['discount'] / 100;
                        $subTotalPrice  = (int)$row['qty'] * (int)$row['harga_satuan'];
                        $totalPrice     = $subTotalPrice; 
            
                        $getDiscountPrice   = $totalPrice * $getDiscount;
            
                        $totalPrice  = $subTotalPrice - $getDiscountPrice;
            
                        $ppnPrice       = ($row['ppn'] / 100 ) *  $totalPrice;
            
                        $getCodeEkspedisi = explode('-', $row['ekspedisi']);    
                        $findEkspedisi  = Ekspedisi::where('code', $getCodeEkspedisi[0])->first();
                        // if (!$findEkspedisi) {
                        //     dd($row);
                        // }
                        $checkCustomerOrder->update([
                            'address'                   => $getAddress->address,
                            'city_id'                   => $getAddress->city_id,
                            'phone'                     => $getAddress->phone,
                            'delivery_date'             => $row['tanggal_kirim'],
                            'discount'                  => $row['discount'],
                            'discount_price'            => $getDiscountPrice,
                            'ppn'                       => $row['ppn'],
                            'initial_price'             => 0,
                            'ppn_price'                 => $ppnPrice,
                            'sub_total_price'           => $subTotalPrice,
                            'total_price'               => $row['total_price'],
                            'staple_price'              => $row['staple_cost'],
                            'ekspedisi_id'              => $findEkspedisi->id ?? 10,
                            'description'               => $row['keterangan_quotation'],
                            'created_by'                => auth()->id(),
                            'status'                    => 2,
                            // 'created_at'                => $row['tanggal_quotation'] ?? '2020-10-01',
                            'customer_receive_address_id'   => $getAddress->id
                        ]);
            
                        $findProduct    = Product::where('code', $row['kode_produk'])->first();
                        if ($findProduct) {
                            CustomerOrderDetail::create([
                                'customer_order_id' => $checkCustomerOrder->id,
                                'product_id'        => $findProduct->id,
                                'qty'               => $row['qty'],
                                'ekspedisi_price'   => $row['ekspedisi_cost'] / $row['qty'],
                                'price_calcium'     => $row['harga_satuan'],
                                'price'             => $row['harga_satuan'],
                                'staple_price'      => $row['staple_cost'],
                                'additional_price'  => null,
                                'product_price'     => $row['harga_satuan'] * $row['qty'],
                                'status'            => 2,
                                // 'customer_card_id'  => $product->customer_card
                            ]);
                        }
                    
                    }
            }
        }
      

    }
}

<?php

namespace App\Imports;

use App\Models\Sales\Customer;
use App\Models\Sales\CustomerReceiveAddress;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CustomerAddressImport implements ToModel, WithStartRow, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $checkCustomer  = Customer::where('code', $row['custid_order'])->first();

        if ($checkCustomer) {
            $checkData  = CustomerReceiveAddress::where('customer_id', $checkCustomer->id)->where('address', $row['address_receive'])->where('pic', $row['custname_receive'])->first();
    
            if (!$checkData) {
                $city   = $row['city_receive'];
                if ($city == null) {
                    $city = 9474;
                }

                CustomerReceiveAddress::create([
                    'customer_id'   => $checkCustomer->id,
                    'code'          => $row['id_alamat_receive'],
                    'pic'           => $row['custname_receive'],
                    'address'       => $row['address_receive'],
                    'city_id'       => $row['city_receive'],
                    'phone'         => $row['phone_receive'] ?? '-'
                ]);
            }
        }
    }
}

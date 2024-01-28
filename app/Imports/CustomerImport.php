<?php

namespace App\Imports;

use App\Models\MasterData\City;
use App\Models\MasterData\Company;
use App\Models\Sales\Customer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CustomerImport implements ToModel, WithStartRow, WithHeadingRow
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
        $checkData  = Customer::where('code', $row['id_customer'])->first();
        $findDsgm   = Company::where('code', 'DSGM')->first();

        if (!$checkData) {
            $findCity   = City::where('name', $row['kota'])->first();

            if ($findCity) {
                $city   = $findCity->id;
            } else {
                $city   = 9474;
            }
            $createCustomer = Customer::create([
                'name'              => $row['nama_customer'],
                'code'              => $row['id_customer'],
                'address'           => $row['alamat'],
                'company_id'        => $findDsgm->id,
                'npwp_image'        => $row['image_npwp'],
                'nik_image'         => $row['image_nik'],
                'city'              => $city,
                'npwp'              => $row['npwp'],
                'nik'               => $row['nik'],
                'email'             => '',
                'phone'             => $row['telfon'],
                'credit'            => $row['crd'],
                'fax'               => $row['fax'],
                'business_area'     => $row['bidang_usaha'],
                'warehouse_address' => '',
                'status'            => 1,
                'pic'               => $row['cp'],
                'pic_position'      => null,
                'pic_phone'         => $row['cp_phone'],
            ]);
        }
    }
}

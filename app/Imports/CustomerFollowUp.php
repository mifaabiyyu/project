<?php

namespace App\Imports;

use App\Models\MasterData\City;
use App\Models\MasterData\Company;
use App\Models\Sales\Customer;
use App\Models\Sales\CustomerFollowUp as SalesCustomerFollowUp;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\Sales\CustomerFollowUpDetail;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerFollowUp implements ToModel, WithStartRow, WithHeadingRow
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
        $idCUstomer = '';
        $visit      = '';

        if ($row['visit'] == 'OFFLINE') {
            $visit  = 1;
        } else {
            $visit  = 0;
        }
        
        if ($row['new_customer'] == "NEW") {
            $code           = IdGenerator::generate(['table' => 'customers', 'field' => 'code', 'length' => 12, 'prefix' =>'CUST-' . date('my')]);
            $findCompany    = Company::where('code', $row['company'])->first();
            $findCity       = City::where('name', $row['kota'])->first();

            $customer       = Customer::create([
                'name'              => $row['nama_perusahaan'],
                'code'              => $code,
                'address'           => $row['alamat'],
                'company_id'        => $findCompany->id,
                'city'              => $findCity->id,
                'npwp'              => $row['npwp'],
                'phone'             => $row['tlp'],
                'business_area'     => $row['bidang'],
                'warehouse_address' => $row['alamat'],
                'status'            => 1,
                'pic'               => $row['pic'],
                'pic_phone'         => $row['tlp'],
            ]);

            $idCUstomer =  $customer->id;
        } else if ($row['new_customer'] == "OLD") {
            $findCustomer   = Customer::where('name', $row[6])->first();
            $idCUstomer     = $findCustomer->id;
        }

        // dump($row);
        
        $originalDate = $row['date'];
        $newDate = date("Y-m-d", strtotime($originalDate));
      
        $createFollowUp     = SalesCustomerFollowUp::create([
            'customer_id'           => $idCUstomer,
            'schedule_date'         => $newDate,
            'about'                 => 'Customer ' . ucfirst(strtolower($row['kontak'])),
            'visit_status'          => $visit,
            'offering_note'         => $row['penawaran'],
            'sample_note'           => $row['sample'],
            'order_note'            => $row['order'],
            'description'           => $row['keterangan'],
            'status'                => 7,
            'created_by'            => auth()->id(),
        ]);


        if ($row['dsgm'] != null || $row['dsgm'] != 'X' || $row['dsgm'] != 'x') {
            CustomerFollowUpDetail::create([
                'customer_follow_up_id' => $createFollowUp->id,
                'company_id'            => 'DSGM',
                'description'           => $row['dsgm']
            ]);
        }

        if ($row['btc'] != null || $row['btc'] != 'X' || $row['btc'] != 'x') {
            CustomerFollowUpDetail::create([
                'customer_follow_up_id' => $createFollowUp->id,
                'company_id'            => "BTC",
                'description'           => $row['btc']
            ]);
        }

        if ($row['imj'] != null || $row['imj'] != 'X' || $row['imj'] != 'x') {
            CustomerFollowUpDetail::create([
                'customer_follow_up_id' => $createFollowUp->id,
                'company_id'            => 'IMJ',
                'description'           => $row['imj']
            ]);
        }
        
        return $createFollowUp;
    }
}

<?php

namespace App\Imports;

use App\Models\Division;
use App\Models\MasterData\Company;
use App\Models\MasterData\Employee;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportEmployee implements ToModel, WithStartRow, WithHeadingRow
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
        $checkNIK   = Employee::where('nik', $row['nik_ktp'])->first();
        $imageName  = null;

        $findCompany    = Company::where('code', 'DSGM')->first();

        $idDepartemen   = null;
        $bpjs           = 0;
        $bpjs_tk           = 0;

        $findDepartemen = Division::where('name', $row['departemen'])->first(); 
        
        if ($findDepartemen) {
            $idDepartemen   = $findDepartemen->id;
        }
        
        if ($row['no_bpjs_kesehatan'] != null) {
            $bpjs   = 1;
        }
        
        if ($row['no_jamsostek'] != null) {
            $bpjs_tk   = 1;
        }



        $code = IdGenerator::generate([
            'table' => (new Employee())->getTable(),
            'field' => 'code',
            'length' => 10,
            'prefix' => 'KRYWN' . '-',
            'reset_on_prefix_change' => true
        ]);

        if (!$checkNIK) {
            $create     = Employee::create([
                'code'          => $code,
                'name'          => $row['nama_karyawan'],
                'gender'        => $row['jk'],
                'date_birth'    => $row['ttl'],
                'address'       => $row['alamat_ktp'],
                'education'     => null,
                'phone'         => $row['no_hp'],
                'photo'         => $imageName,
                'description'   => null,
                'status'        => 1,
                'company_id'    => $findCompany->id,
                'unit_id'       =>  null,
                'division_id'   => $idDepartemen,
                'shift_id'      => null,
                'email'         => $row['e_mail'],
                'nik'           => $row['nik_ktp'],
                'position'      => $row['jabatan'],
                'start_work'    => $row['tgl_masuk_kerja'],
                'bpjs_tk'       => $bpjs_tk,
                'bpjs_ks'       => $bpjs,
                'status_karyawan'       => $row['status'],
                'no_jamsostek'       => $row['no_jamsostek'],
            ]);
        } else {
            $checkNIK->update([
                'code'          => $code,
                'name'          => $row['nama_karyawan'],
                'gender'        => $row['jk'],
                'date_birth'    => $row['ttl'],
                'address'       => $row['alamat_ktp'],
                'education'     => null,
                'phone'         => $row['no_hp'],
                'photo'         => $imageName,
                'description'   => null,
                'status'        => 1,
                'company_id'    => $findCompany->id,
                'unit_id'       =>  null,
                'division_id'   => $idDepartemen,
                'shift_id'      => null,
                'email'         => $row['e_mail'],
                'nik'           => $row['nik_ktp'],
                'position'      => $row['jabatan'],
                'start_work'    => $row['tgl_masuk_kerja'],
                'bpjs_tk'       => $bpjs_tk,
                'bpjs_ks'       => $bpjs,
                'status_karyawan'       => $row['status'],
                'no_jamsostek'       => $row['no_jamsostek'],
            ]);
        }

    }
}

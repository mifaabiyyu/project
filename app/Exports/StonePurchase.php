<?php

namespace App\Exports;

use App\Models\RawMaterial\StonePurchase as RawMaterialStonePurchase;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class StonePurchase implements FromCollection, WithMapping, WithHeadings, WithTitle
{
    use Exportable;
    protected $request;
    public $data;
    public $number = 1;

    public function headings(): array
    {
        return [
            'No',
            'Jenis Batu',
            'Supplier',
            'No Polisi',
            'Supir',
            'No TT',
            'Netto',
            '% Potongan',
            '% Kelas 1',
            'Keterangan',
            'Kualitas',
            'Lokasi Simpan',
        ];
    }

    function __construct($request) {
        $this->request = $request;
    }

    public function collection()
    {
        $this->data = RawMaterialStonePurchase::with('get_supplier', 'get_stone')->select('stone_purchases.*')->orderBy('created_at', 'desc');

        if ($this->request->dateInput) {
            $date = explode('-', $this->request->dateInput);
            $start = date('Y-m-d', strtotime($date[0]));
            $end = date('Y-m-d', strtotime($date[1]));
            $this->data->whereBetween('date', [$start, $end]);
        }

        if ($this->request->supplier) {
            $this->data->where('supplier_id', $this->request->supplier);
        }

        if ($this->request->stone) {
            $this->data->where('stone_id', $this->request->stone);
        }

        $this->data     = $this->data->get();

        return $this->data;
    }

    public function title(): string
    {
        return 'Stone Purchase';
    }

    public function map($data): array
    {
        // dd($data->get_product_satuan->pluck('get_satuan.name')->implode(', '));
        return [
            $this->number++,
            $data->get_stone->name,
            $data->get_supplier->name,
            $data->nopol_kendaraan,
            $data->driver,
            $data->nomor_tt,
            $data->netto,
            $data->potongan,
            $data->weight_fix,
            $data->description,
            $data->quality,
            $data->location,
        ];
    }
}

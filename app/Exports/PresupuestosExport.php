<?php

namespace App\Exports;

use App\Presupuesto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PresupuestosExport implements FromView
{

//    /**
//    * @return \Illuminate\Support\Collection
//    */
//    public function collection()
//    {
//        return Presupuesto::all();
//    }

//    use Exportable;

//    public function query()
//    {
//        return Presupuesto::query();
//    }
//
//    public function map($invoice): array
//    {
//        return [
//            $invoice->invoice_number,
//            Date::dateTimeToExcel($invoice->created_at),
//            $invoice->total
//        ];
//    }
//
//    /**
//     * @return array
//     */
//    public function columnFormats(): array
//    {
//        return [
//            'B' => NumberFormat::FORMAT_DATE_DDMMYYYY,
//            'C' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE,
//        ];
//    }
//
//    public function headings(): array
//    {
//        return [
//            'Presupuesto',
//        ];
//    }
    public function view(): View
    {
        return view('exports.presupuesto', [
            'presupuestos' => Presupuesto::all()
        ]);
    }
}

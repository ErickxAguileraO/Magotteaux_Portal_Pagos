<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Cell\StringValueBinder;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PagosProveedorExport extends StringValueBinder  implements WithMapping, WithHeadings, FromCollection, ShouldAutoSize, WithStyles, WithCustomValueBinder
{
    public $pagos;

    public function __construct(Collection $pagos)
    {
        $this->pagos = $pagos;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->pagos;
    }

    public function map($pagos): array
    {
        return [
            $pagos->pag_id,
            $pagos->pag_referencia,
            $pagos->pag_importe_moneda,
            $pagos->pag_fecha_documento,
            $pagos->pag_vencimiento_neto,
            $pagos->pag_moneda_documento,
            $pagos->tipo->tip_nombre,
            $pagos->pag_estado,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Referencia',
            'Importe de moneda',
            'Fecha de documento',
            'Fecha vencimiento neto',
            'Moneda documento',
            'Forma de pago',
            'Estado',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:H1')->getFont()->setBold(true);
    }
}

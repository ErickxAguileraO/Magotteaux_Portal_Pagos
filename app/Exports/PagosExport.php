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

class PagosExport extends StringValueBinder  implements WithMapping, WithHeadings, FromCollection, ShouldAutoSize, WithStyles, WithCustomValueBinder
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
            $pagos->pag_razon_social,
            $pagos->pag_cuenta,
            $pagos->pag_identificacion,
            $pagos->pag_referencia,
            $pagos->pag_clase_documento,
            $pagos->pag_numero_documento,
            $pagos->pag_fecha_documento,
            $pagos->pag_vencimiento_neto,
            $pagos->pag_importe_moneda,
            $pagos->pag_texto,
            $pagos->pag_asignacion,
            $pagos->pag_demora_vencimiento,
            $pagos->pag_forma_pago,
            $pagos->pag_estado,
            $pagos->planta->pla_nombre
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Razon social',
            'Cuenta',
            'Identificacion',
            'Referencia',
            'Clase de documento',
            'Numero de documento',
            'Fecha de documento',
            'Fecha vencimiento neto',
            'Importe de moneda',
            'Texto',
            'Asignacion',
            'Demora de vencimiento',
            'Forma de pago',
            'Estado',
            'Planta',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:O1')->getFont()->setBold(true);
    }
}

<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProveedorExport implements WithMapping, WithHeadings, FromCollection, WithColumnWidths, WithDefaultStyles, ShouldAutoSize, WithStyles
{
    public $proveedores;

    public function __construct(Collection $proveedores)
    {
        $this->proveedores = $proveedores;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->proveedores;
    }

    public function map($proveedores): array
    {
        return [
            $proveedores->pro_id,
            $proveedores->pro_razon_social,
            $proveedores->pro_identificacion,
            $proveedores->pais->pai_nombre,
            $proveedores->getEstado(),
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Razón social',
            'Identificación',
            'País',
            'Estado',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'F' => 20,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:F1')->getFont()->setBold(true);
    }

    public function defaultStyles(Style $defaultStyle)
    {
        $defaultStyle->getAlignment()->setHorizontal('left');
    }
}

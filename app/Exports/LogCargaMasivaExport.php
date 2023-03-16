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

class LogCargaMasivaExport implements WithMapping, WithHeadings, FromCollection, WithColumnWidths, WithDefaultStyles, ShouldAutoSize, WithStyles
{
    public $LogCarga;

    public function __construct(Collection $LogCarga)
    {
        $this->LogCarga = $LogCarga;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->LogCarga;
    }

    public function map($LogCarga): array
    {
        return [
            $LogCarga->log_id,
            $LogCarga->log_archivo,
            $LogCarga->log_fila,
            $LogCarga->created_at->format('d-m-Y'),
            $LogCarga->created_at->format('H:i'),
            $LogCarga->usuario->usu_nombre.' '.$LogCarga->usuario->usu_apellido,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Arhivo',
            'Fila',
            'Fecha',
            'Hora',
            'Usuario',
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

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HonorariosExport implements FromCollection, WithHeadings
{
    use Exportable;

    private $data= [];

    public function __construct(array $data)
    {
        $this->data = $data;

    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return [
            'NÚMERO',
            'OBSERVACIONES',
            'JUZGADO',
            'ESTADO',
            'ACTOR',
            'DNI DE ACTOR',
            'ABOGADO DE ACTOR',
            'HONORARIOS ACTOR',
            'Fecha de Pago de Actor',
            'DEMANDADO',
            'DNI DE DEMANADADO',
            'ABOGADO DE DEMANDADO',
            'HONORARIOS DE DEMANDADO',
            'Fecha de Pago de Demandado',
            'SUBTOTAL',
        ];
    }

}

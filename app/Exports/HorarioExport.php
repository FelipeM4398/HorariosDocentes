<?php

namespace App\Exports;

use App\HorarioDetalle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use Illuminate\Support\Collection;

class HorarioExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $horarioArray = [];
        foreach (HorarioDetalle::all() as $horario) {
            foreach ($horario->horarioDia()->get() as $dia) {
                foreach ($horario->grupos()->get() as $grupo) {
                    $data = array(
                        $horario->periodo()->first()->año . '-' . $horario->periodo()->first()->periodo,
                        $horario->docente()->first()->identificacion,
                        $horario->docente()->first()->nombres . ' ' . $horario->docente()->first()->apellidos,
                        $horario->asignatura()->first()->codigo,
                        $horario->asignatura()->first()->nombre,
                        $grupo->nombre,
                        $grupo->programa()->first()->nombre,
                        $grupo->jornadaAcademica()->first()->nombre,
                        $dia->dia()->first()->nombre,
                        $dia->salon()->first() ? $dia->salon()->first()->nombre : 'Sin asignar',
                        $dia->salon()->first() ?
                            $dia->salon()->first()->sede()->first()->nombre : 'Sin asignar',
                        $dia->salon()->first() ?
                            $dia->salon()->first()->subsede()->first() ?
                            $dia->salon()->first()->subsede()->first()->nombre : 'NULL' : 'NULL',
                        $dia->horaInicio(),
                        $dia->horaFin()
                    );
                    array_push($horarioArray, $data);
                }
            }
        }
        $collection = Collection::make($horarioArray);
        return $collection;
    }

    public function headings(): array
    {
        return [
            'PERIODO',
            'IDENTIFICACIÓN_DOCENTE',
            'NOMBRE_DOCENTE',
            'CÓDIGO_ASIGNATURA',
            'NOMBRE_ASIGNATURA',
            'GRUPO',
            'PROGRAMA',
            'JORNADA',
            'DÍA',
            'SALÓN',
            'SEDE',
            'SUBSEDE',
            'HORA_INICIO',
            'HORA_FIN'
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        $styleArray = [
            'font' => [
                'bold' => true
            ]
        ];

        return [
            // Handle by a closure.
            AfterSheet::class => function (AfterSheet $event) use ($styleArray) {
                $event->sheet->getStyle('A1:Z1')->applyFromArray($styleArray);
            },

        ];
    }
}

<?php

namespace SIS\Imports;

use SIS\Recinto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RecintosImport implements ToModel, WithChunkReading, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Recinto([
            'nombre' => $row['nombre'],
            'direccion' => $row['direccion'],
            'estado' => 'A',
        ]);
    }

    //Metodo para definir la candidad del tamanio de pedazos por lote que debe importar
    public function chunkSize(): int
    {
        return 1000;
    }
}

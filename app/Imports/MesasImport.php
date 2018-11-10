<?php

namespace SIS\Imports;

use SIS\Mesa;
use SIS\Recinto;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MesasImport implements ToCollection, WithChunkReading, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $recinto = Recinto::where('nombre',$row['recinto'])->first();
            if(isset($recinto)){
                $numero_mesa = $row['iniciar'];
                for ($i=1; $i <= $row['cantidad']; $i++) { 
                    Mesa::create([
                        'nombre' => 'Mesa - '.$numero_mesa++,
                        'recinto_id' => $recinto->id,
                        'estado' => 'A',
                    ]);
                }
            }
        }
    }

    //Metodo para definir la candidad del tamanio de pedazos por lote que debe importar
    public function chunkSize(): int
    {
        return 1000;
    }
}

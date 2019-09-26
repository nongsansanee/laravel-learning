<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\TimeStamp;
use Illuminate\Support\Facades\Validator;


class TimeStampImport implements ToCollection ,WithHeadingRow
{

     use Importable;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
        \Log::info($collection);

        validator::make($collection->toArray(),[
                '*.sap_id'=> 'required|digits:8'
               
        ])->validate();

        foreach($collection as $row)
        {
                TimeStamp::create([
                    'id_card'=> $row['id_card'],
                    'sap_id' => $row['sap_id'],
                    'full_name' => $row['full_name'],
                    'date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date']),
                    'time' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['time']),
                    'reader' => $row['reader'],
                    'come_in' => $row['come_in'],
                    'door' => $row['door'],
                ]);
        }
    }
    public function headingRow()
    {
        return 3;
    }
}

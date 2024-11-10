<?php

namespace App\Imports;

use App\Models\CHECKS_PRC_Model;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class ListOfGraduatesImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Skip the header row
        $rows->shift();

        $importedData = [];
        foreach ($rows as $row) {
            $importedData[] = [
                'Student_ID' => $row[0],
                'Last_name' => $row[1],
                'First_name' => $row[2],
                'Middle_name' => $row[3],
                'Sex' => $row[4],
                'Date_of_birth' => $row[5],
                'Date_graduated' => $row[6],
                'Program' => $row[7],
                'Major' => $row[8]
            ];
        }

        // Store the data temporarily in the session for display
        session(['importedData' => $importedData]);
    }
}

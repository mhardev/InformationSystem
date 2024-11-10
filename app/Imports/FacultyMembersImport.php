<?php

namespace App\Imports;

use App\Models\CHECKS_E5_Model;
use Maatwebsite\Excel\Concerns\ToModel;

class FacultyMembersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CHECKS_E5_Model([
            //
        ]);
    }
}

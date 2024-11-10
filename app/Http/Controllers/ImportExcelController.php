<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportExcelController extends Controller
{
    function index()
    {
        $data = DB::table('tbl_customer')->orderBy('CustomerID', 'DESC')->get();
        return view('import_excel', compact('data'));
    }

    function import(Request $request)
    {
        $request->validate([
            'select_file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('select_file');
        $path = $file->getRealPath();

        $spreadsheet = IOFactory::load($path);
        $worksheet = $spreadsheet->getActiveSheet();
        $dataRows = $worksheet->toArray(null, true, true, true);

        $insert_data = [];
        foreach ($dataRows as $index => $row) {
            // Skip the header row
            if ($index == 1) {
                continue;
            }

            $insert_data[] = [
                'CustomerName' => $row['A'],  // Adjust column letters as per your Excel structure
                'Gender'       => $row['B'],
                'Address'      => $row['C'],
                'City'         => $row['D'],
                'PostalCode'   => $row['E'],
                'Country'      => $row['F']
            ];
        }

        if (!empty($insert_data)) {
            DB::table('tbl_customer')->insert($insert_data);
        }

        return back()->with('success', 'Excel Data Imported successfully.');
    }
}

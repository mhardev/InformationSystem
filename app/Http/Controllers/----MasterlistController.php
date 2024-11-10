<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

include(app_path() . '\phpspreadsheet\autoload.php');

class MasterlistController extends Controller
{
    public function masterlist(Request $request)
    {
        if(!empty($request->session()->get('user_id'))){
            return view('masterlist');
        }
        else
        {
            return view('login');
        }
    }

    public function full_scan(Request $request)
    {
        if(!empty($_FILES["csv_file"]["name"])){
            $allowed_extension = array('csv');
            $file_array = explode(".", $_FILES["csv_file"]["name"]);
            $file_extension = end($file_array);

            if(in_array($file_extension, $allowed_extension)){

                $file_name = base_path('public/temp_files/'.$_FILES["csv_file"]["name"]);
                move_uploaded_file($_FILES['csv_file']['tmp_name'], $file_name);
                $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
                $reader->setInputEncoding('CP1252');
                $spreadsheet = $reader->load($file_name);
                $data_1 = $spreadsheet->getActiveSheet()->toArray();
                $data_2 = $spreadsheet->getActiveSheet()->toArray();
                if((count($data_1[0]) == 7) && ($data_1[0][0] == "Scholarship") && ($data_1[0][1] == "Last Name") && ($data_1[0][2] == "First Name") && ($data_1[0][3] == "Extension Name") && ($data_1[0][4] == "Middle Name") && ($data_1[0][5] == "HEI") && ($data_1[0][6] == "Program")) //check template
                {
                    array_shift($data_1);
                    array_shift($data_2);

                    $arr_duplicates = array();
                    $arr_sample = array();
                    $ctr_1 = 1;
                    $characters = array('-','.');
                    $unsupported_chars = array('Ñ', 'ñ');
                    foreach($data_1 as $row_1)
                    {
                        $ctr_2 = 1;
                        foreach($data_2 as $row_2)
                        {

                            similar_text(str_replace($unsupported_chars, 'N', str_replace($characters, '',preg_replace('/\s+/', '',trim($row_1[1])))).''.str_replace($unsupported_chars, 'N', str_replace($characters, '',preg_replace('/\s+/', '',trim($row_1[2])))), str_replace($unsupported_chars, 'N', str_replace($characters, '',preg_replace('/\s+/', '',trim($row_2[1])))).''.str_replace($unsupported_chars, 'N', str_replace($characters, '',preg_replace('/\s+/', '',trim($row_2[2])))), $percentage_1);
                            similar_text(str_replace($unsupported_chars, 'N', str_replace($characters, '',preg_replace('/\s+/', '',trim($row_1[4])))), str_replace($unsupported_chars, 'N', str_replace($characters, '',preg_replace('/\s+/', '',trim($row_2[4])))), $percentage_2);

                            $total_percentage = (($percentage_1 * .90) + ($percentage_2 * .10));
                            if($total_percentage > 89.99 && ($ctr_1 != $ctr_2)){
                                array_push($arr_duplicates, array($row_1[0], $row_1[1], $row_1[2], $row_1[3], $row_1[4], $row_1[5], $row_1[6], $row_2[0], $row_2[1], $row_2[2], $row_2[3], $row_2[4], $row_2[5], $row_2[6], number_format($total_percentage, 2)));
                            }

                            $ctr_2++;
                        }

                        $ctr_1++;
                    }
                    unlink($file_name);
                    return view('masterlist', ['arr_duplicates' => $arr_duplicates, 'arr_sample' => $arr_sample]);
                }
                else
                {
                    unlink($file_name);
                    return view('masterlist', ['result' => false, 'error' => 'error_1']);
                }

            }
            else
            {
                return view('masterlist', ['result' => false, 'error' => 'error_1']);
            }
        }
        else
        {
            return view('masterlist', ['result' => false, 'error' => 'error_1']);
        }
    }


    public function selective_scan(Request $request)
    {
        if(!empty($_FILES["csv_file_1"]["name"]) && !empty($_FILES["csv_file_2"]["name"])){
            $allowed_extension = array('csv');
            $file_array = explode(".", $_FILES["csv_file_1"]["name"]);
            $file_1_extension = end($file_array);
            $file_array = explode(".", $_FILES["csv_file_2"]["name"]);
            $file_2_extension = end($file_array);

            if(in_array($file_1_extension, $allowed_extension) && in_array($file_2_extension, $allowed_extension)){
                //file 1
                $file_1 = base_path('public/temp_files/'.rand(10,100).''.time().''.$_FILES["csv_file_1"]["name"]);
                move_uploaded_file($_FILES['csv_file_1']['tmp_name'], $file_1);
                $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_1);
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
                $reader->setInputEncoding('CP1252');
                $spreadsheet = $reader->load($file_1);
                $data_1 = $spreadsheet->getActiveSheet()->toArray();
                //file 2
                $file_2 = base_path('public/temp_files/'.rand(10,100).''.time().''.$_FILES["csv_file_2"]["name"]);
                move_uploaded_file($_FILES['csv_file_2']['tmp_name'], $file_2);
                $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_2);
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
                $reader->setInputEncoding('CP1252');
                $spreadsheet = $reader->load($file_2);
                $data_2 = $spreadsheet->getActiveSheet()->toArray();

                if((count($data_1[0]) == 7) && ($data_1[0][0] == "Scholarship") && ($data_1[0][1] == "Last Name") && ($data_1[0][2] == "First Name") && ($data_1[0][3] == "Extension Name") && ($data_1[0][4] == "Middle Name") && ($data_1[0][5] == "HEI") && ($data_1[0][6] == "Program") && (count($data_2[0]) == 7) && ($data_2[0][0] == "Scholarship") && ($data_2[0][1] == "Last Name") && ($data_2[0][2] == "First Name") && ($data_2[0][3] == "Extension Name") && ($data_2[0][4] == "Middle Name") && ($data_2[0][5] == "HEI") && ($data_2[0][6] == "Program")) //check template
                {
                    array_shift($data_1);
                    array_shift($data_2);

                    $arr_duplicates = array();
                    $characters = array('-','.');
                    $unsupported_chars = array('Ñ', 'ñ');
                    foreach($data_1 as $row_1)
                    {
                        foreach($data_2 as $row_2)
                        {
                            similar_text(str_replace($unsupported_chars, 'N', str_replace($characters, '', preg_replace('/\s+/', '',trim($row_1[1])))).''.str_replace($unsupported_chars, 'N', str_replace($characters, '', preg_replace('/\s+/', '',trim($row_1[2])))), str_replace($unsupported_chars, 'N', str_replace($characters, '', preg_replace('/\s+/', '',trim($row_2[1])))).''.str_replace($unsupported_chars, 'N', str_replace($characters, '', preg_replace('/\s+/', '',trim($row_2[2])))), $percentage_1);
                            similar_text(str_replace($unsupported_chars, 'N', str_replace($characters, '',preg_replace('/\s+/', '',trim($row_1[4])))), str_replace($unsupported_chars, 'N', str_replace($characters, '',preg_replace('/\s+/', '',trim($row_2[4])))), $percentage_2);

                            $total_percentage = (($percentage_1 * .90) + ($percentage_2 * .10));
                            if($total_percentage > 89.99){
                                array_push($arr_duplicates, array($row_1[0], $row_1[1], $row_1[2], $row_1[3], $row_1[4], $row_1[5], $row_1[6], $row_2[0], $row_2[1], $row_2[2], $row_2[3], $row_2[4], $row_2[5], $row_2[6], number_format($total_percentage, 2)));
                            }

                        }

                    }
                    unlink($file_1);
                    unlink($file_2);
                    return view('masterlist', ['arr_duplicates' => $arr_duplicates]);
                }
                else
                {
                    unlink($file_1);
                    unlink($file_2);
                    return view('masterlist', ['result' => false, 'error' => 'error_1']);
                }

            }
            else
            {
                return view('masterlist', ['result' => false, 'error' => 'error_1']);
            }
        }
        else
        {
            return view('masterlist', ['result' => false, 'error' => 'error_1']);
        }
    }


    public function export_excel(Request $request){

        if(!empty($request->get('tbl_content')))
        {
            $tbl_content = '<table><tr><td style="text-align: center;" colspan="16">Searching Algorithm for De-Duplication (SAD)</td></tr>'.$request->get('tbl_content').'</table>';

            $temporary_html_file = base_path('public/temp_files/'.time().'.html');

            file_put_contents($temporary_html_file, $tbl_content);

            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Html');

            $spreadsheet = $reader->load($temporary_html_file);

            $spreadsheet->getActiveSheet()->getStyle('A1:' . $spreadsheet->getActiveSheet()->getHighestColumn() . $spreadsheet->getActiveSheet()->getHighestRow())->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);

            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');

            $filename = time().'.xlsx';

            $writer->save(base_path('public/temp_files/'.$filename));

            unlink($temporary_html_file);
            // $fileurl = base_path('public/temp_files/'.$filename);
            // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            // header('Content-Disposition: attachment;filename="'.$filename.'"');
            // readfile($fileurl);

            return response()->json(['success' => true, 'filename' => $filename]);
        }
        else
        {
            return response()->json(['success' => false]);
        }

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\Writer\Xls;

USE App\Models\Office;
use App\Models\External_passe;
use Illuminate\Support\Arr;
use PhpOffice\PhpWord\TemplateProcessor;

class ExportsController extends Controller
{
    public function ExportToWord($id)
    {
        $auxP = External_passe::find($id);
        $auxF = $auxP->File;
        $auxT = $auxP->To_Office;

        $data = [];
        $data = Arr::add($data, 'Files_number', ($auxF->dependence_number."-".$auxF->central_number."-".$auxF->final_number));
        $data = Arr::add($data, 'concept', $auxF->concept);
        $data = Arr::add($data, 'to', $auxT->name);
        $data = Arr::add($data, 'to_sie_code', $auxT->code_sie);
        $data = Arr::add($data, 'response', $auxP->response);

        // Crear una instancia, los parámetros se pasan a la dirección del archivo de plantilla
        $templateProcessor = new TemplateProcessor('static/Model Provi.docx');

        // Reemplaza (establece) el valor de la variable. Los caracteres que reemplacé durante la prueba eran relativamente largos, así que lo acorté aquí

        $templateProcessor-> setValue ('number', Arr::get($data,'Files_number'));
        $templateProcessor-> setValue ('concept', Arr::get($data,'concept'));
        $templateProcessor-> setValue ('response', Arr::get($data,'response'));
        $templateProcessor-> setValue ('to', Arr::get($data,'to'));
        $templateProcessor-> setValue ('to_sie_code', Arr::get($data,'to_sie_code'));

        // guardar documento

        $templateProcessor->saveAs('static/temp/'.Arr::get($data,'Files_number').'.docx');

        return response()->download('static/temp/'.Arr::get($data,'Files_number').'.docx');
    }

    public function Excel()
    {
        return response()->json('áca response', 200);
    }

    public function OfficesExport(Request $request)
    {

        $rows = 4;
        $aux = 1;

        $fileName = "dependencias.pdf";
        $path = 'static/temp/';

        $name = $request->name;
        $internal_phone = $request->internal;
        $code_sie = $request->SIE;
        $officer_in_charge = $request->officer_in_charge;
        $order_by = $request->order_by;
        $order = $request->order;

        $employees = Office::where('name','LIKE','%'.$name.'%')
        ->where('internal_phone','LIKE','%'.$internal_phone.'%')
        ->where('code_sie','LIKE','%'.$code_sie.'%')
        ->where('officer_in_charge',"LIKE",'%'.$officer_in_charge.'%')
        ->orderBy($order_by, $order)
        ->get();


        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xls");
        $spreadsheet = $reader->load('static/Modelo Listado de Dependencias.xls');
        $sheet = $spreadsheet->getActiveSheet();

        foreach($employees as $empDetails){
            $sheet->setCellValue('A' . $rows,  $aux);
            $sheet->setCellValue('B' . $rows, $empDetails['name']);
            $sheet->setCellValue('C' . $rows, $empDetails['internal_phone']);
            $sheet->setCellValue('D' . $rows, $empDetails['code_sie']);
            $sheet->setCellValue('E' . $rows, $empDetails['email']);
            $sheet->setCellValue('F' . $rows, $empDetails['alternative_email']);
            $sheet->setCellValue('G' . $rows, $empDetails['officer_in_charge']);
            $rows++;
            $aux++;
        }

        $writer = new Xls($spreadsheet);
        $type = 'blob';
        $header= ['Content-Type', $type];
        $writer->save($path.$fileName);

        return response()->Download('static/temp/'.$fileName);

    }
}




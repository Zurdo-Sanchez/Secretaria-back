<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\External_passe;
use Facade\FlareClient\Http\Response;
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
}




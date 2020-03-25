<?php

namespace App\Http\Controllers;

use App\CodingLanguage;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function create(Request $request){
    $codingLanguage = new CodingLanguage();
    $codingLanguage->name = $request->name;
    $codingLanguage->context_id = $request->context_id;

    $codingLanguage->save();
    // Leite auf Home weiter
    return redirect('/addLanguage');
}
public function createSingle(Request $request){
        $codingLanguage = new CodingLanguage();
        $codingLanguage->name = $request->name;
        $codingLanguage->context_id = $request->context_id;
        $codingLanguage->save();
    }
    // API
    public function getAllLanguages(){
        $language = CodingLanguage::all();
        return $language->jsonSerialize();
    }
}

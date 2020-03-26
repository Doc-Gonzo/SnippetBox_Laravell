<?php

namespace App\Http\Controllers;

use App\Sammlung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SammlungController extends Controller
{
    public function create(Request $request){
        $sammlung = new Sammlung();
        $sammlung->name = $request->name;
        $sammlung->user_id = $request->user_id;

        $sammlung->save();
        // Leite auf Home weiter
        return redirect('/addSammlung');
    }
    public function createSingle(Request $request){
        $sammlung = new Sammlung();
        $sammlung->name = $request->name;
        $sammlung->user_id = Auth::id();

        $sammlung->save();
    }
    // API
    public function getAllSammlungenJson(){
        $sammlung = Sammlung::all();
        return $sammlung->jsonSerialize();
    }
}

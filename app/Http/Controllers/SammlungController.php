<?php

namespace App\Http\Controllers;

use App\Sammlung;
use Illuminate\Http\Request;

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
}

<?php

namespace App\Http\Controllers;

use App\Context;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContextController extends Controller
{
    public function create(Request $request){
        $context = new Context();
        $context->name = $request->name;

        $context->save();
        // Leite auf Home weiter
        return redirect('/addContext');
    }
    public function getAllContexts(){
        $contexts = Context::all();

        return $contexts;
    }
}

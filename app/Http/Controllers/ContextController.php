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
    public function createSingle(Request $request){
        $context = new Context();
        $context->name = $request->name;
        $context->save();
    }
    public function getAllContexts(){
        $contexts = Context::all();

        return $contexts;
    }
    // API
    public function getAllContextsJson(){
        $context = Context::all();
        return $context->jsonSerialize();
    }
}

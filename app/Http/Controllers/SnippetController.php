<?php

namespace App\Http\Controllers;

use App\Snippet;
use Illuminate\Http\Request;

class SnippetController extends Controller
{
    public function create(Request $request){
        $snippet = new Snippet();
        $snippet->name = $request->name;
        $snippet->user_id = $request->user_id;
        $snippet->desc = $request->desc;
        $snippet->snippet_content = $request->snippet_content;
        $snippet->sammlung_id = $request->sammlung_id;
        $snippet->coding_language_id = $request->codingLanguage_id;
        $snippet->public = $request->public;

        $snippet->save();

        return redirect('/addSnippet');
    }
    // API
    public function getAllSnippets(){
        $snippets = Snippet::all();
        return $snippets;
    }
}

<?php

namespace App\Http\Controllers;

use App\CodingLanguage;
use App\Snippet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;

class SnippetController extends Controller
{
    public function create(Request $request){
        $snippet = new Snippet();
        $snippet->name = $request->name;
        $snippet->snippet_slug = $this->slugTitle($request->name);
        $snippet->user_id = $request->user_id;
        $snippet->desc = $request->desc;
        $snippet->snippet_content = $request->snippet_content;
        $snippet->sammlung_id = $request->sammlung_id;
        $snippet->coding_language_id = $request->codingLanguage_id;
        $snippet->public = $request->public;

        $snippet->save();

        return redirect('/addSnippet');
    }
    public function update(Request $request){
        $snippet = new Snippet();
        $snippet->name = $request->snippet_name;
        $snippet->id = $request->snippet_id;
        $snippet->snippet_slug = $this->slugTitle($request->snippet_name);
        $snippet->user_id = $request->snippet_user_id;
        $snippet->desc = $request->snippet_desc;
        $snippet->snippet_content = $request->snippet_content;
        $snippet->update();

        return redirect('/addSnippet/');
    }
    public function slugTitle($title){
        $slug = STR::slug($title);
        return $slug;
    }
    // API
    public function getAllSnippets(){
        $snippet = Snippet::all();

        return $snippet->jsonSerialize();
    }
    public function getAllSnippetsClean(){
        $allSnippets = Snippet::all();

        // Array indem saubere Snippets landen
        $snippetsClean = array();
        // Jedes gefundene Snippet aufbereiten -> LangName suchen, array basteln und dieses Array in Hauptarray pushen
        foreach ($allSnippets as $snippet) {
            $snippetLanguage = CodingLanguage::findOrFail($snippet->coding_language_id);
            $snippetLangName = $snippetLanguage->name;
            $cleanArray = array('Name' => $snippet->name, "Desc" => $snippet->desc, 'ID' => $snippet->id, 'Langname' =>$snippetLangName);
            array_push($snippetsClean, $cleanArray);
        }

        $snippetsClean = json_encode($snippetsClean);
        return $snippetsClean;
    }
    public function getSnippet($snippet_id){
       return view('snippet_detail', [
           'snippet_id' => $snippet_id
       ]);
    }
    public function show($snippet_id){
        $snippet = Snippet::findOrFail($snippet_id);
        return $snippet->toJson();
    }
    public function showSlug($snippet){
        $snippet = Snippet::findOrFail($slug);
        return $snippet->toJson();
    }
}

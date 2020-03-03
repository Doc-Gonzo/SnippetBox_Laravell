<?php

namespace App\Http\Controllers;

use App\CodingLanguage;
use App\Snippet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
    public function slugTitle($title){
        $slug = STR::slug($title);
        return $slug;
    }
    // API
    public function getAllSnippets(){
        $snippet = Snippet::all();
        return $snippet->jsonSerialize();
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

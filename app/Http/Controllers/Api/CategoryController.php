<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id){
        /***
         * per fare chiarezza nella mia testa
         * 1. L'argomento che viene passato alla funzione show, !è l'argomento variabile che viene letto nell'url
         *      e che noi indichiamo nella Route:: con le parentesi {} -> Route::get("category/{category}", "Api\CategoryController@show")
         * 2. il paragone che viene fatto nel where() è tra l'id di una categoria e il parametro che accetta la funzione  show()
         * 3. il with() è da studiare come funziona, so solo che insieme alla tabella principale ci attacca tutte quelle che sono collegate tramite relazione a database 
         *   */
        $category = Category::where("id", $id)->with("post")->first();

        /* dump($category);
        exit; */
        

        return response()->json($category);
    }
}

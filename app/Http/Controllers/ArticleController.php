<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function viewClient(){
        return view('client.article.view');
    }
}

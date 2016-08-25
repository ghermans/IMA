<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DocsController extends Controller
{
    public function emoticonDocs()
    {
        return view('docs.emoticons');
    }
}

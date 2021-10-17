<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LangController extends Controller
{
    public function set($lang, Request $request){
        $acceptlang = ['ar','en'];
        if(! in_array($lang , $acceptlang )){
            $lang = 'en';
        }
        $request->session()->put('lang', $lang);
        return back();
    }
}

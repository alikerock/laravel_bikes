<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function about(){
        // return '<h2>about page</h2>';
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
}

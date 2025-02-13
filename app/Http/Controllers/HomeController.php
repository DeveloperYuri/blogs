<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('home');
    }

    public function about(){
        return view('about');
    }

    public function team(){
        return view('team');
    }
    public function gallery(){
        return view('gallery');
    }
    public function blog(){
        return view('blog');
    }
    public function contact(){
        return view('contact');
    }
}

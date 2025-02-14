<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
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
        $data['getRecord'] = BlogModel::getRecordFront();
        return view('blog', $data);
    }
    public function blogdetail($slug){
        $getRecord = BlogModel::getRecordSlug($slug);
        
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            return view('blog_detail', $data);
        }
        else {
            abort(404);
        }
    }
    public function contact(){
        return view('contact');
    }
}

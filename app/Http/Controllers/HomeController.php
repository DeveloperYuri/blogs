<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function team()
    {
        return view('team');
    }
    public function gallery()
    {
        return view('gallery');
    }
    public function blog()
    {
        $data['getRecord'] = BlogModel::getRecordFront();
        return view('blog', $data);
    }
    public function blogdetail($slug)
    {
        $getCategory = CategoryModel::getSlug($slug);

        if (!empty($getCategory)) {
            $data['getRecord'] = BlogModel::getRecordFrontCategory($getCategory->id);
            return view('blog', $data);
        } else {
            $getRecord = BlogModel::getRecordSlug($slug);

            if (!empty($getRecord)) {
                $data['getCategory'] = CategoryModel::getCategory();
                $data['getRecentPost'] = BlogModel::getRecentPost();
                $data['getRelatedPost'] = BlogModel::getRelatedPost($getRecord->category_id, $getRecord->id);
                $data['getRecord'] = $getRecord;
                return view('blog_detail', $data);
            } else {
                abort(404);
            }
        }
    }
    public function contact()
    {
        return view('contact');
    }
}

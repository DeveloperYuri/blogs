<?php

namespace App\Http\Controllers;

use App\Models\PageModel;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function page()
    {
        $data['getRecord'] = PageModel::getRecord();
        return view('backend.page.list', $data);
    }

    public function add_page()
    {
        return view('backend.page.add');
    }

    public function insert_page(Request $request)
    {
        $save = new PageModel;

        $save->slug = trim($request->slug);
        $save->title = trim($request->title);
        $save->description = trim($request->description);
        $save->meta_title = trim($request->meta_title);
        $save->meta_description = trim($request->meta_description);
        $save->meta_keywords = trim($request->meta_keywords);
        $save->save();

        return redirect('panel/page/list')->with('success', 'Page successfuly created');
    }

    public function edit_page($id)
    {
        $data['getRecord'] = PageModel::getSingle($id);
        return view('backend.page.edit', $data);
    }

    public function update_page($id, Request $request)
    {
        $save = PageModel::getSingle($id);

        $save->slug = trim($request->slug);
        $save->title = trim($request->title);
        $save->description = trim($request->description);
        $save->meta_title = trim($request->meta_title);
        $save->meta_description = trim($request->meta_description);
        $save->meta_keywords = trim($request->meta_keywords);
        $save->save();

        return redirect('panel/page/list')->with('success', 'Page successfuly updated');
    }

    // public function delete_blog($id)
    // {
    //     $save = BlogModel::getSingle($id);

    //     $save->is_delete = 1;
    //     $save->save();

    //     return redirect()->back()->with('success', "Blog Succesfully Deleted");
    // }

}

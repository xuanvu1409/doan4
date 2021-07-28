<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //News Page
        $list = News::all()->sortDesc();
        return view('admin.news.index')->with('list', $list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Create News Page
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create News
        $request->validate([
            'title' => 'required|min:1|max:250',
            'content' => 'required|min:1',
            'sort' => 'number',
            'image.*' => 'image'
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->description = $request->description;
        $news->created = date('Y-m-d');
        $news->content = $request->get('content');
        $news->sort_order = $request->sort_order;
        $news->status = $request->status;

        $file = $request->file('image');
        if ($request->hasFile('image')) {
            $img_name = $file->getClientOriginalName();
            $image = time() . '-' . $img_name;
            Storage::disk('storage')->putFileAs("news", $file, $image);
            $news->image = $image;
        }

        $news->save();
        return redirect()->route('admin.news')->with('success', 'Thêm tin tức thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Edit News Page
        $news = News::find($id);
        return view('admin.news.edit')->with('news', $news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Update News
        $request->validate([
            'title' => 'required|min:1|max:250',
            'content' => 'required|min:1',
            'sort_order' => 'integer',
            'image.*' => 'image'
        ]);

        $news = News::find($id);
        $news->title = $request->title;
        $news->description = $request->description;
        $news->sort_order = $request->sort_order;
        $news->content = $request->get('content');
        $news->status = $request->status;
        $file = $request->file('image');
        if ($request->hasFile('image')) {
            Storage::disk('storage')->delete("news/$news->image");
            $img_name = $file->getClientOriginalName();
            $image = time() . '-' . $img_name;
            Storage::disk('storage')->putFileAs("news", $file, $image);
            $news->image = $image;
        }
        $news->save();
        return redirect()->route('admin.news')->with('success', 'Cập nhật tin tức thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete news
        $news = News::find($id);
        Storage::disk('storage')->delete("news/$news->image");
        $news->delete();
        return redirect()->back()->with('success', 'Xoá tin tức thành công.');
    }
}

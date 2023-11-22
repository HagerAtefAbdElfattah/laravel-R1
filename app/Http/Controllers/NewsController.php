<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showNews = News::get();
        return view("News", compact('showNews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("addNews");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $news = new News ;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->author = $request->author;
        if(isset($request->published)){
         $news->published = true;
        }else{
         $news->published = false;
        }
        $news->save();
        return"<h1>". $request->title."<h1>" . " is your news title and here is the content: " . "<br>" . $request->content . "<br>" . "<br>" . "<br>" . "Author: " . $request->author;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editNews = News:: FindOrFail($id);
        return view('updateNews',compact('editNews'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

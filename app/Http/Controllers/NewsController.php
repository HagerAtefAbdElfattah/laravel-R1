<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    private $columns = ['title', 'content', 'author', 'published'];
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
        // $news = new News ;
        // $news->title = $request->title;
        // $news->content = $request->content;
        // $news->author = $request->author;
        // if(isset($request->published)){
        //  $news->published = true;
        // }else{
        //  $news->published = false;
        // }
        // $news->save();

        $data =$request->only($this->columns);
        $data['published']=isset($data['published'])? true:false;
        $request->validate([
        'title'=> 'required|string',
        'content'=> 'required|string',
        'author'=> 'required|string|max:100'
        ]);
        News::create($data);
        return"<h1>". $request->title."<h1>" . " is your news title and here is the content: " . "<br>" . $request->content . "<br>" . "<br>" . "<br>" . "Author: " . $request->author;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $displayNews= News:: FindOrFail($id);
        return view('newsDetails',compact('displayNews'));
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
        $data =$request->only($this->columns);
        $data['published']=isset($data['published'])? true:false;
       News::where('id', $id)->update($data);
        return '<script>alert("updated successfully")</script>';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        News::where('id', $id)->delete();
       return '<script>alert("The news has been deleted successfully")</script>';
    }

    
    /**
     * The trashed data.
     */
    public function trashed() 
    {
        $news= News::onlyTrashed()->get();
       return view('trashedNews',compact('news'));
    }

    
    /**
     * To restore the soft deleted data.
     */
    public function restore(string $id) : RedirectResponse
    {
        News:: where('id', $id )->restore();
        return redirect('news');
    }

    /**
     * Remove the specified resource from storage permanently.
     */
    
     public function forceDelete(string $id): RedirectResponse
     {
     News::where('id', $id)->forceDelete();
     return redirect('news');
     }
}

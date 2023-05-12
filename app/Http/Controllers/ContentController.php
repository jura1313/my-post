<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('create', ["category"=>$category]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'title'=>['required'],
            'category'=>['required'],
            'excerpt'=>['required'],
            'content'=>['required'],
        ]);

        Content::create([
            'title'=>$request->title,
            'slug'=>str($request->title),
            'category_id'=>$request->category,
            'excerpt'=>$request->excerpt,
            'content'=>$request->content,
            'user_id'=> Auth::id(),
        ]);

        return redirect('my_post')->with('status_create', 'Data Berhasil Ditambahkan!');

    }


    public function show()
    {
        $content = Content::all();
        return view("home", ["post"=>$content]);
    }

    public function all_post()
    {
        $content = User::all();
        return view("posts", ["post"=>$content]);
    }

    public function view_post(Content $post)
    {
        // $post = Content::where('id', $id)->get();

        return view('view_post', ["post"=>$post]);
    }

    public function categories(Category $category) {
        return view('categories',[
            'title' => $category->category,
            'post' => $category->content,
            'category' => $category->category,
        ]);
    }

    public function author(User $author) {
        return view('authors',[
            'title' => $author->category,
            'post' => $author->content,
            'category' => $author->category,
        ]);
    }

    public function my_post() {
        $my_post = Content::Where('user_id',Auth::id())->get();

        return view('my_post', ["post"=>$my_post]);
    }

    public function delete_content($id) {
        Content::destroy($id);

        return redirect('my_post')->with('status_delete', 'Data Berhasil Dihapus!');

    }

    public function update($id) {
        $content = Content::Where('id',$id)->get();
        $category = Category::all();

        return view('update', ["post"=>$content,"category"=>$category]);

    }

    public function edit(Request $request, $id)
    {
        $data = $request->all();

        $content = Content::findorfail($id)->update($data);

        return redirect("my_post")->with('status_update', 'Data Berhasil Diperbaharui!');
    }


    public function destroy(Content $content)
    {
        //
    }
}


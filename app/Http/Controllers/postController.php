<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

date_default_timezone_set("Asia/Jakarta");

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index', [
            "title" => "Projects",
            "posts" => Post::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    public function index_projects()
    {
        return view('projects', [
            "title" => "Projects",
            "posts" => Post::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => "Create post"
        );
        return view('posts.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
        [
            'title' => 'required|unique:posts,title|max:100',
            'description' => 'required'
        ],
        [
            'title.required' => 'The title is required.',
            'title.unique' => 'The title has already been taken.',
            'title.max' => 'The title must not be greater than 100 characters.',
            'description.required' => 'The description is required.'
        ]);
        $post = new Post;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();
        return redirect('posts')->with('success', 'Berhasil dipost!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show', [
            'title' => "Detail Project",
            'posts' => Post::find($id)
        ]);

        // $data = array(
        //     'id' => "posts",
        //     'title' => "Detail Author",
        //     'posts' => Post::find($id)
        // );
        // return view('posts.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'title' => "Detail Project",
            'posts' => Post::find($id)
        );
        return view('posts.edit')->with($data);
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
        $request->validate([
            'title' => 'required|unique:posts,title|max:100',
            'description' => 'required'
        ]);
        Post::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description
        ]);
        return redirect('posts')->with('success', 'Berhasil diupdate!!');
        // cara lainnya
        // $post = Post::find($id);
        // $post->title = $request->input('title');
        // $post->description = $request->input('description')
        // $post->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('posts')->with('success', 'Berhasil dihapus!!');
    }

    public function __construct()
    {
    $this->middleware('auth');
    }

}
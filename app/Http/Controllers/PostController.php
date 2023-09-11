<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny',Post::class);
        $posts = Post::latest()->get();
        return view('admin.posts.list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = $request->user()->id;
      
        $post = new Post();
        $post->fill($request->all());
        $post->user_id = $userId;
        $status = $post->save();
        if($status){
            return redirect()->route('admin.posts.index')->with('msg', "Tạo bài viết thành công");
        }
        else {
            return back()->with('msg', "Bạn không thể tạo bài viết vào lúc này");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
       
        $this->authorize('update', $post);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->fill($request->all());
        $userId = $request->user()->id;
        $post->user_id = $userId;
        $status = $post->update();
    
        if($status){
            return redirect()->route('admin.posts.index')->with('msg', "Cập nhật bài viết thành công");
        }
        else {
            return back()->with('msg', "Bạn không thể cập nhật bài viết vào lúc này");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
     
        $post->delete();
        return redirect()->route('admin.posts.index')->with('msg', "Xóa bài viết thành công");
    }
}

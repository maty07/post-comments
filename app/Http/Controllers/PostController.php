<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PostController extends Controller
{

  public function index()
  {
    $posts = Post::with('user')->get();

    return view('posts.index', compact('posts'));
  }


  public function create()
  {
    return view('posts.create');
  }


  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|unique:posts',
      'body' => 'required'
    ]);

    $post = new Post;
    $post->title = $request->title;
    $post->slug = str_slug($request->title);
    $post->body = $request->body;
    $post->user_id = auth()->user()->id;
    $post->save();

    return redirect()->route('posts.index');
  }


  public function show(Post $post)
  {
    $comments = Comment::with('user')->where('post_id', $post->id)->get();

    return view('posts.show', compact('post', 'comments'));
  }


  public function edit(Post $post)
  {
    return view('posts.edit', compact('post'));
  }


  function update(Request $request, Post $post)
  {
    $request->validate([
      'title' => ['required', Rule::unique('posts')->ignore($post->id)],
      'body' => 'required'
    ]);

    $post->title = $request->title;
    $post->slug = str_slug($request->title);
    $post->body = $request->body;
    $post->user_id = auth()->user()->id;
    $post->save();

    return redirect()->route('posts.show', $post->id);
  }


  public function destroy(Post $post)
  {
    $post->delete();

    return redirect('posts');
  }
}

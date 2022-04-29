<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

use App\Models\Post;
use App\Models\User;
use App\Models\Like;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $users = User::all();
        return view('laravel_views.posts', compact('posts', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laravel_views.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $posts = new Post;
        $form  = $request->all();
        $posts->fill($form);
        $posts->user_id = Auth::user()->id;
        $posts->save();
        return redirect('/posts');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        $post = Post::find($post_id);
        return view('laravel_views.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $posts = Post::find($id);
        $form  = $request->all();
        $posts->update($form);
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();
        return redirect('/posts');
    }

    /**
     * 引数のIDに紐づくリプライにLIKEする
     *
     * @param $id リプライID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function like($id)
    {
        Like::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
        ]);

        session()->flash('success', 'You Liked the Reply.');

        return redirect()->back();
    }

    /**
     * 引数のIDに紐づくリプライにUNLIKEする
     *
     * @param $id リプライID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unlike($id)
    {
        $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();

        session()->flash('success', 'You Unliked the Reply.');

        return redirect()->back();
    }
}

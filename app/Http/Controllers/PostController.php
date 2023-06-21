<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\http\Requests\PostRequest;
use App\http\Requests\UpdateRequest;
use App\models\category;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('categoryMiddleware')->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        $tags = tag::all();
        return view('posts.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = post::create([
            'name' => $request->name,
            'content' => $request->content,
            'discription' => $request->discription,
            'image' => $request->image->store('images', 'public'),
            'category_id' => $request->category_id,
        ]);

        $post->tags()->attach($request->tags);

        session()->flash('success', 'post ceratetd sucsesfly');
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('posts.create')->with('post', $post)->with('categories', category::all());;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, post $post)
    {
        $data = $request->only(['name', 'content', 'discription', 'category_id']);
        if ($request->hasFile('image')) {

            storage::disk('public')->delete($post->image);
            $data['image'] = $request->image->store('images', 'public');
        };

        $post->update($data);
        session()->flash('success', 'post updated sucsesfly');
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::withTrashed()->where('id', $id)->first();

        if ($post->trashed()) {

            Storage::delete('public/' . $post->image);
            $post->forceDelete();
            return redirect()->route('trashed')->with(session()->flash('success', 'post deleted sucsesfly'));
        } else {

            $post->delete();
            return redirect()->route('post.index')->with(session()->flash('success', 'post trashed sucsesfly'));
        }
    }

    public function trashed()
    {
        $trashed =  post::onlyTrashed()->get();
        return view('posts.index')->with('posts', $trashed);
    }
    public function restore($id)
    {
        $post =  post::onlyTrashed()->where('id', $id);
        $post->restore();
        return redirect()->route('trashed')->with(session()->flash('success', 'post restore sucsesfly'));
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\category;
use App\Models\User;

use Illuminate\Http\Request;

class FrontendControler extends Controller
{
   public function index()
  {
    $categories =Category::all();
    $posts = Post::paginate(12);
      return view('maine.home')->with('posts',$posts)->with('categories',$categories);
  }  
  public function showcategory( $id)
  {
    $posts = Post::where('category_id',$id)->get();
    $categories =Category::all();
    
      return view('maine.category')->with('posts',$posts)->with('categories',$categories);
      
  }  
  public function search(request $request)
  {
    
    $categories = Category::all();
    $search = $request->search;
    
    $posts = Post::wherehas('category',function($query) use($search){
      $query->where('name','like',"%$search%");
    })->orwhere(function($query) use($search){
      $query->where('name','like',"%$search%")->orwhere('discription','like',"%$search%");
    })->orwherehas('user',function($query) use($search){
      $query->where('name','like',"%$search%");
    })->get();
    return view('maine.search')->with('posts',$posts)->with('categories',$categories);
  }
   public function post(Post $post )
  {
    return view('maine.post')->with('post',$post)->with('categories',Category::all());
  }
}

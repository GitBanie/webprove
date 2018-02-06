<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Illuminate\Support\Facades\Input;

class FrontController extends Controller
{
  public function index()
  {
    // $book = Book::with('picture', 'authors', 'score')->paginate(5);
    $posts = Post::orderBy('id', 'desc')->take(2)->get();
    $title = 'Webprove';
    $description = 'Improve your web knowledge';
    $img = 'img/home-bg.jpg';
    return view('front.index', compact('posts', 'title' , 'description' , 'img'));
  }

  public function show($id)
  {
    $post = Post::find($id);
    return view('front.show', compact('post'));
  }

  public function stage()
  {
    $stages = Post::where('post_type', 'stage')->paginate(5);
    $title = 'Stage';
    $description = 'Tous nos stages';
    $img = 'img/about-bg.jpg';

    return view('front.stage', compact('stages' , 'posts', 'title' , 'description' , 'img'));
  }

  public function formation()
  {
    $formations = Post::where('post_type', 'formation')->paginate(5);
    $title = 'Formation';
    $description = 'Tous nos formations';
    $img = 'img/post-bg.jpg';

    return view('front.formation' , compact('formations', 'title' , 'description' , 'img'));
  }

  public function contact()
  {
    $title = 'Contact';
    $description = 'Nous contacter';
    $img = 'img/contact-bg.jpg';

    return view('front.contact', compact('title' , 'description' , 'img'));
  }

  public function search()
  {
    $search = Input::get ( 'search' );
    $post = Post::where('title','LIKE','%'.$search.'%')->orWhere('description','LIKE','%'.$search.'%')->paginate(5);

    $title = "Result";
    $img = 'img/search-bg.jpg';

    if(count($post) > 0){
      $description = "The Search results for your query : <b> $search </b>";
      return view('front.search', compact('title', 'description', 'img'))->withDetails($post);
    }
    else{
      $description = 'No Details found. Try to search again !';
      return view ('front.search', compact('title', 'description', 'img'));
    }

    // return view ('front.search', compact('title', 'description', 'img'));
  }

}

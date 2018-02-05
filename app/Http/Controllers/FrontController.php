<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class FrontController extends Controller
{
  public function index()
  {
    // $book = Book::with('picture', 'authors', 'score')->paginate(5);
    $posts = Post::orderBy('id', 'desc')->take(2)->get();
    return view('front.index', ['posts' => $posts]);
  }

  public function show()
  {
    // $book = Book::with('picture', 'authors', 'score')->paginate(5);
    // $posts = Post::orderBy('id', 'desc')->take(2)->get();
    return view('front.show');
  }

  public function stage()
  {
    return view('front.stage');
  }

  public function formation()
  {
    return view('front.formation');
  }

  public function contact()
  {
    return view('front.contact');
  }
}

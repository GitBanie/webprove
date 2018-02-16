<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{
    public function liveSearch(Request $request)
    {
        $output="";
        $search = $request->search;
        $posts = Post::where('title', 'LIKE', '%'.$search.'%')->orWhere('description', 'LIKE', '%'.$search.'%')->get();

        return Response($posts);
      }
}

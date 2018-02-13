<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use App\Post;
use App\Category;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);

        return view('back.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();

        return view('back.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $post = Post::create($request->all());

        # Traitement d'image
        $img = $request->file('picture');
        if (!empty($img)) {
            //Methode store retourne un link hash sécurisé
            $link = $img->store('images');

            $post->picture()->create([
            'link' => $link,
            'title' => $request->title_image?? $request->title
          ]);
        }

        return redirect()->route('post.index')->with('message', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('back.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('name', 'id')->all();

        return view('back.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostCreateRequest $request, $id)
    {
      $post = Post::find($id);
      $post->update($request->all());

      #Traitement d'image

      //Suppression
      if(isset($post->picture)){
        if(!empty($request->file('picture'))){
          Storage::disk('local')->delete($post->picture->link); //Supprime physiquement l'image
          $post->picture()->delete(); //Supprime l'information en bdd
        }
      }

      //Ajout
      $img = $request->file('picture');
      if (!empty($img)) {

          //Methode store retourne un link hash sécurisé
          $link = $img->store('images');

          $post->picture()->create([
          'link' => $link,
          'title' => $request->title_image?? $request->title
        ]);
      }

      return redirect()->route('post.index')->with('message', 'Success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // //Recuperation de l'id
      // $post = Post::find($id);
      // //Suppression de l'image si elle existe
      // if(isset($post->picture)){
      //   Storage::disk('local')->delete($post->picture->link); //Supprimer physiquement l'image
      //   $post->picture()->delete(); //Supprimer l'information en bdd
      // }
      //
      // $post->delete();
      //
      // return redirect()->route('post.index')->with('message', 'Success');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Storage;

class DestroyController extends Controller
{

  //Single destroy
    public function destroy($id)
    {
        //Recuperation de l'id
        $post = Post::find($id);
        //Suppression de l'image si elle existe
        if (isset($post->picture)) {
            Storage::disk('local')->delete($post->picture->link); //Supprimer physiquement l'image
      $post->picture()->delete(); //Supprimer l'information en bdd
        }

        $post->delete();

        return response()->json($post);
    }

    //Multiple Destroy
    public function del(Request $request)
    {
        $ids = $request->input('deletes');

        foreach ($ids as $id) {
            $post = Post::find($id);
            if (isset($post->picture)) {
                Storage::disk('local')->delete($post->picture->link); //Supprimer physiquement l'image
        $post->picture()->delete(); //Supprimer l'information en bdd
            }
            $post->delete();
        }
        return redirect()->route('post.index')->with('message', 'Success');
    }
}

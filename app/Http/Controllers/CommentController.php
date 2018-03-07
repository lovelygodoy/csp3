<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;


class CommentController extends Controller
{


    public function store($id)
    {

        Comment::create([

            'content' => request('content'),
            'post_id' => $id,
            'user_id' => Auth::user()->id
        ]);

       
        return back();
    }


    public function delete($id) {
        Comment::find($id)->delete();

        return back();
    }

    public function update($id) {


        Comment::find($id)->update([
     
            'content' => request('content'),
            'user_id' => Auth::user()->id
        ]);

        return back();
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Auth;
use App\User;
use App\Post;
use Session;
use Html;
use File;
use Validator;


class PostController extends Controller
{
    public function __construct(){

        $this->middleware('auth')->except('index', 'show');
    }


    public function index(){
        

        $posts = Post::latest()
        ->filter(request(['month', 'year']))
        ->simplePaginate(3);


        return view('posts.index',compact('posts'));

    }

    public function show(Post $post){

    	return view('posts.post', compact('post'));
    }

    function createPost( Request $request){

        

        $posts = Auth::user()->posts()->paginate(3);
        
        return view('posts.posts_list', compact('posts'));
	}

    public function store() {

        $validator = Validator::make(request()->all(), [
            'title' => 'required|unique:posts|max:255',
            'photo' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('posts/create')
                        ->withErrors($validator)
                        ->withInput();
        }

      
        if (request()->hasFile('photo'))
        {
            $path = ('image');
            $file = request('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1111,9999).".".$extension;
            $file->move($path, $filename);
            $photo = $filename;
            
        }


        Post::create([
            'title' => request('title'),
            'content' => request('content'),
            'photo' => $filename,
            'user_id' => Auth::user()->id
        ]);


       Session::flash('status', 'Post added successfully!');

    	return redirect('/posts');
    }

    public function delete($id){

        Post::find($id)->delete();
        Session::flash('status', 'Post deleted successfully!');

        return back();
    }

    public function update($id) {


        Post::find($id)->update([
            'title' => request('title'),
            'content' => request('content'),
            'user_id' => Auth::user()->id
        ]);

        Session::flash('status', 'Post updated successfully!');

        return back();
    }
}

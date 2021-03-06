<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;



class PostController extends Controller
{

        public function __construct()
        {
            return $this->middleware('auth');
        }

        public function create()
        {
            return view('post');
        }

        public function store(Request $request)
        {
        $post =  new Post;
        $post->title = $request->get('title');
        $post->body = $request->get('body');

       
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $imageName = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('images'), $imageName);
        $post->save();
       
        return redirect('posts')
        ->with('success','You have successfully upload image.')
        ->with('image',$imageName);

    }

    public function update($id)
    {
        
        $post = Post::where('id',$id)->get();
        exit;
        $upval = $id;
        $upval = $post['title'];
        $upval = $post['body'];
        
        $update= Post::where('id',$id)->update($upval);
        return redirect('posts');

    }

        public function delete($id)
        {
            $post = Post::where('id',$id)->delete($id);
            
            return redirect('posts');
        }
     
    
        public function index()
        {
            $posts = Post::all();

            return view('index', compact('posts'));
        }

        public function show($id)
        {
            $post = Post::find($id);

            return view('show', compact('post'));
        }
}
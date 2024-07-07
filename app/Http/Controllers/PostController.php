<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index(){
    $posts=Post::all();
    return view("posts.Post",['posts'=>$posts]);
   }
   public function show($postId){
    $post=Post::findOr($postId);
    return view('posts.show',['post'=>$post]);

   }
   public function create(){
    $user=User::all();
    return view('posts.createPost',['user'=>$user]);
   }
   public function store(Request $request){
    $validatedData = $request->validate([
        'title' => ['required', 'min:5', 'max:10'],
        'description' => ['required'],
        'PostedBy' => ['required','exists:users,id'],

    ]);
  

    $post = new Post;
 
    $post->title = $request->title;
    $post->description = $request->description;
    $post->user_id = $request->PostedBy;
  

    $post->save();

    return redirect('/post')->with('success', 'Data inserted Successfully');
   }

   public function edit($id){
    $user=User::all();
    $posts=Post::find($id);

    return view('posts.edit',['posts'=>$posts,'user'=>$user]);
   }
   public function update(Request $request, $id)
   {
       // Validate the incoming request data
       $validatedData = $request->validate([
           'title' => ['required', 'min:5', 'max:10'],
           'description' => ['required'],
           'PostedBy' => ['required', 'exists:users,id'],
       ]);
   
       // Find the post by ID or fail
       $post = Post::findOrFail($id);
   
       // Update the post attributes with validated data
       $post->title = $validatedData['title'];
       $post->description = $validatedData['description'];
       $post->user_id = $validatedData['PostedBy'];
   
       // Save the updated post to the database
       $post->save();
   
       // Redirect back to the posts index with a success message
       return redirect()->route('posts.index')->with('success', 'Data updated Successfully');
   }
   
   public function delete($id){
    $post=Post::find($id);
    if($post){
        Post::destroy($id);

    }
   
    return back()->with('message', 'data deleted success');


   }

}

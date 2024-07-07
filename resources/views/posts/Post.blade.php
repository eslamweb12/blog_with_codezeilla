
@extends('app.layout')

@section('content')
           
   
        <div  class="text-center mb-2">
          <a href="{{ route('posts.create') }}" class="btn btn-success">create post</a>
          </div>
          @if(session()->has('success'))
    <div class="alert alert-success mt">
        {{ session()->get('success') }}
    </div>
@endif
@if(Session::has('message'))
<p class="alert alert-danger">{{ Session::get('message') }}</p>
@endif
          <table class="table mt-1">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">PostedBy</th>
                <th scope="col">createdAt</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{  $post->title }}</td>
                    <td>{{  $post->description }}</td>
                    <td>{{  $post->user ? $post->user->name :'not found'}}</td>
                    <td>{{  $post->created_at }}</td>
                    <td>
                      <a href="{{ route('posts.show',$post['id']) }}" class="btn btn-info ">View</a>
                      <a href="{{ route('posts.edit',$post['id']) }}"class="btn btn-primary">Edit</a>

                      <form style="display:inline;" method="POST" action="{{ route('post.delete', $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </tr>
                    
                @endforeach
          

              
            </tbody>
          </table>
  @endsection
     
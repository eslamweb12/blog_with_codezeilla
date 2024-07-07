
@extends('app.layout')

@section('content')
        <div class="card">
            <div class="card-header">
            PostInfo
            </div>
            <div class="card-body">
              <h5 class="card-title"name="title">Titile:{{ $post->title }}</h5>
              <p class="card-text" name="description">Description:{{ $post->description }}</p>
             
            </div>
        </div>
        <div class="card mt-3">
            <h5 class="card-header"  name="PostedBy">Post Creator</h5>
            <div class="card-body">
              <h5 class="card-title">name:{{ $post->user ? $post->user->name :'not found' }}</h5>
              <p class="card-text">email:{{  $post->user ? $post->user->email :'not found' }}</p>
              <p class="card-text">created At:{{ $post->user ? $post->user->created_at:'not found' }}</p>
          
            </div>
          </div>
          @endsection


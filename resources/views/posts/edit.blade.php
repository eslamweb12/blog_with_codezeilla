@extends('app.layout')

@section('content')
<form method="POST" action="{{ route('posts.update', $posts->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input class="form-control" type="text" id="exampleFormControlInput1" value="{{ old('title', $posts->title) }}" name="title">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1"  rows="3" name="description">{{ old('description', $posts->description) }}</textarea>
    </div>
    <div class="form-group mb-2">
        <label for="exampleSelect">Post Creator</label>
        <select class="form-control" id="exampleSelect" name="PostedBy">
            @foreach ($user as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection

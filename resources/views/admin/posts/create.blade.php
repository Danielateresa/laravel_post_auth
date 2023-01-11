@extends('layouts.admin')

@section('content')
<h2 class="pt-5">Create new post</h2>

<form action="{{route('admin.posts.store')}}" method="post">
    @csrf
    <!-- messaggi errore -->
    @include('partials.errors')

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
            placeholder="" aria-describedby="helpId" value="{{old('title')}}">
        <small id="helpId" class="text-muted">Required field, must be unique and max 100 characters</small>
    </div>
    @error('title')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
            placeholder="this field is automatically filled" aria-describedby="helpId" value="{{old('slug')}}">
        <small id="helpId" class="text-muted"></small>
    </div>
    @error('slug')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
            placeholder="" aria-describedby="helpId" value="{{old('description')}}"></textarea>
        <small id="helpId" class="text-muted"></small>
    </div>
    @error('description')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <button class="btn btn-primary" type="submit">Add post</button>

</form>

@endsection
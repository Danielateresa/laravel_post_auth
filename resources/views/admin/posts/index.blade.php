@extends('layouts.admin')

@section('content')
<h2 class="pt-5">My posts</h2>

@if(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    <strong>{{session('message')}}</strong>
</div>
@endif

<div class=" d-flex">
    <a class="btn btn-primary my-3 ms-auto" href="{{route('admin.posts.create')}}">New post</a>
</div>
<div class="table-responsive">
    <table class="table table-striped
    table-hover	
    table-borderless
    table-primary
    align-middle">
        <thead class="table-light">
            <tr>
                <th>id</th>
                <th>title</th>
                <th>slug</th>
                <th>description</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse($posts as $post)
            <tr class="table-primary">
                <td scope="row">{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->slug}}</td>
                <td>{{$post->description}}</td>
                <td class="">
                    <a class="btn btn-secondary" href="{{route('admin.posts.show', $post->slug)}}">Show</a>
                    <a class="btn btn-primary" href="{{route('admin.posts.edit', $post->slug)}}">Edit</a>
                    <!-- Modal trigger button -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deletepost-{{$post->id}}">Delete</button>

                    <!-- Modal Body -->
                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                    <div class="modal fade" id="deletepost-{{$post->id}}" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalpostId-{{$post->id}}"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalpostId-{{$post->id}}">Delete post</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Do you want to delete this post permanentely?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>

                                    <form class="d-inline" action="{{route('admin.posts.destroy', $post->slug)}}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <h4>No posts in database yet</h4>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
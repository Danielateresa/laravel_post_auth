@extends('layouts.admin')

@section('content')
<h2 class="py-5">Post details</h2>

<h4>Post title: <span class="fw-normal">{{$post->title}}</span></h4>
<h4>Post slug: <span class="fw-normal">{{$post->slug}}</span></h4>
<h4>Post description: <span class="fw-normal">{{$post->description}}</span></h4>
@endsection
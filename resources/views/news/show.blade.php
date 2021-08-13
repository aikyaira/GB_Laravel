@extends('layouts.main')
@section('title') {{ $news->title }} - @parent @stop
@section('content')
<main class="post blog-post col-lg-8">
    <div class="container">
        <div class="post-single">
            <div class="post-thumbnail"><img src="https://picsum.photos/730/486?random={{ $news->id }}" alt="{{ $news->title }}" class="img-fluid"></div>
            <div class="post-details">
                <h1>{{ $news->title }}</i></a></h1>
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                        <div class="avatar"><img src="{{ asset('img/avatar-3.jpg') }}" alt="Admin" class="img-fluid"></div>
                        <div class="title"><span>Admin</span></div>
                    </a>
                </div>
                <div class="post-body">
                    <p class="lead">{{ $news->description }}</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

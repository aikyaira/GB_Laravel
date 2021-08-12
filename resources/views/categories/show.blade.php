@extends('layouts.main')
@section('title') $category['name'] - @parent @stop
@section('content')
<!-- Latest Posts -->
<main class="posts-listing col-lg-8">
<h1>{{ $category['name'] }}</h1>
    <div class="container">
        <div class="row">
            @forelse ($newsList as $n)
            <!-- post -->
            <div class="post col-xl-6">
                <div class="post-thumbnail"><a href="post.html"><img src="https://picsum.photos/350/233?random={{ $n['id'] }}" alt="{{ $n['title'] }}" class="img-fluid"></a></div>
                <div class="post-details">
                    <div class="post-meta d-flex justify-content-between">
                        <div class="date meta-last">{{ now()->format('d M | Y') }}</div>
                    </div><a href="{{ route('news.show', ['id'=>$n['id']]) }}">
                        <h3 class="h4">{{ $n['title'] }}</h3>
                    </a>
                    <p class="text-muted">{{ $n['description'] }}</p>
                    <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                            <div class="avatar"><img src="{{ asset('img/avatar-3.jpg') }}" alt="..." class="img-fluid"></div>
                            <div class="title"><span>Admin</span></div>
                        </a>
                    </footer>
                </div>
            </div>
            @empty
            <h2>Новостей в этой категории нет</h2>
            @endforelse
        </div>
        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-template d-flex justify-content-center">
                <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-left"></i></a></li>
                <li class="page-item"><a href="#" class="page-link active">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-right"></i></a></li>
            </ul>
        </nav>
        <a  class="btn btn-primary" href="{{ route('categories') }}">Назад</a>
    </div>
</main>
@endsection
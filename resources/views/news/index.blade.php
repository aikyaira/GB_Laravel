@extends('layouts.main')
@section('title') Список новостей - @parent @stop
@section('content')
<!-- Latest Posts -->
<main class="posts-listing col-lg-8">
    <div class="container">
        <div class="row">
            @forelse ($news as $item)
            <!-- post -->
            <div class="post col-xl-6">
                <div class="post-thumbnail"><a href="{{ route('news.show', $item) }}"><img src="https://picsum.photos/350/233?random={{ $item->id }}" alt="{{ $item->title }}" class="img-fluid"></a></div>
                <div class="post-details">
                    <div class="post-meta d-flex justify-content-between">
                        <div class="date meta-last">{{ $item->created_at->format('d M | Y') }}</div>
                    </div><a href="{{ route('news.show', $item) }}">
                        <h3 class="h4">{{ $item->title }}</h3>
                    </a>
                    <p class="text-muted">{{ $item->description }}</p>
                    <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                            <div class="avatar"><img src="{{ asset('img/avatar-3.jpg') }}" alt="..." class="img-fluid"></div>
                            <div class="title"><span>{{ $item->author }}</span></div>
                        </a>
                    </footer>
                </div>
            </div>
            @empty
            <h2>Новостей нет</h2>
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
    </div>
</main>
@endsection
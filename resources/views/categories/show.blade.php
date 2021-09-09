@extends('layouts.main')
@section('title') {{ $categoryName }} - @parent @stop
@section('content')
    <!-- Latest Posts -->
    <main class="posts-listing col-lg-8">
        <h1>{{ $categoryName }}</h1>
        <div class="container">
            <div class="row">
                @forelse ($news as $n)
                    <!-- post -->
                    <div class="post col-xl-6">
                        <div class="post-thumbnail">
                            @if ($n->image)
                                <a href="{{ route('news.show', ['id' => $n->id]) }}">
                                    <img src="{{ Storage::disk('public')->url($n->image) }}" alt="{{ $n->title }}"
                                        class="img-fluid"></a>
                            @endif
                        </div>
                        <div class="post-details">
                            <div class="post-meta d-flex justify-content-between">
                                <div class="date meta-last">{{ now()->format('d M | Y') }}</div>
                            </div><a href="{{ route('news.show', ['news' => $n->id]) }}">
                                <h3 class="h4">{{ $n->title }}</h3>
                            </a>
                            <p class="text-muted">{!! $n->description !!}</p>
                            <footer class="post-footer d-flex align-items-center"><a href="#"
                                    class="author d-flex align-items-center flex-wrap">
                                    <div class="avatar"><img src="{{ asset('img/avatar-3.jpg') }}" alt="..."
                                            class="img-fluid"></div>
                                    <div class="title"><span>{{ $n->author }}</span></div>
                                </a>
                            </footer>
                        </div>
                    </div>
                @empty
                    <h2>Новостей в этой категории нет</h2>
                @endforelse
            </div>

            
            <a class="btn btn-primary" href="{{ route('categories') }}">Назад</a>
        </div>
    </main>
@endsection

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
                        <div class="post-thumbnail">
                            @if ($item->image)
                                <a href="{{ route('news.show', $item) }}">
                                    <img src="{{ Storage::disk('public')->url($item->image) }}" alt="{{ $item->title }}"
                                        class="img-fluid">
                                </a>
                            @endif
                        </div>
                        <div class="post-details">
                            <div class="post-meta d-flex justify-content-between">
                                <div class="date meta-last">{{ $item->created_at->format('d M | Y') }}</div>
                            </div><a href="{{ route('news.show', $item) }}">
                                <h3 class="h4">{{ $item->title }}</h3>
                            </a>
                            <p class="text-muted">{!! $item->description !!}</p>
                            <footer class="post-footer d-flex align-items-center"><a href="#"
                                    class="author d-flex align-items-center flex-wrap">
                                    <div class="avatar"><img src="{{ asset('img/avatar-3.jpg') }}" alt="..."
                                            class="img-fluid"></div>
                                    <div class="title"><span>{{ $item->author }}</span></div>
                                </a>
                            </footer>
                        </div>
                    </div>
                @empty
                    <h2>Новостей нет</h2>
                @endforelse
            </div>
            {{$news->links('paginator.default')}}
        </div>
    </main>
@endsection

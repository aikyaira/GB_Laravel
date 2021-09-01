@extends('layouts.main')
@section('title') Категории - @parent @stop
@section('content')
<main class="posts-listing col-lg-8">
    <div class="container px-4 py-5">
        <h2 class="pb-2 border-bottom">Категории</h2>
        <div class="row">
            @forelse ($categories as $item)
            
            <div class="col col-md-4 d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                    <i class="fa fa-list">
                    </i>
                </div>
                <div>
                    <h3>{{ $item->title }}</h3>
                    <p>{{ $item->description }}</p>
                    <a href="{{ route('categories.show', $item) }}" class="btn btn-primary">
                        Показать
                    </a>
                </div>
            </div>
            @empty
            <div class="col d-flex align-items-start">
                <h2>Нет категорий!</h2>
            </div>
            @endforelse

        </div>
    </div>
</main>
@endsection
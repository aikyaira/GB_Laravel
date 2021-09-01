@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Редактировние новости</h1>
        <a href="{{ route('admin.news.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> К списку новостей</a>

    </div>

    <div class="row">
        @include('inc.message')
        <form method="post" class="col-sm-12" action="{{ route('admin.news.update', ['news' => $news]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <input type="text" class="form-control" id="image" name="image" placeholder="Изображение"
                    value="{{ $news->image }}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Название"
                    value="{{ $news->title }}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="author" name="author" placeholder="Автор"
                    value="{{ $news->author }}">
            </div>
            <div class="form-group">
                <select class="form-control" id="category_id" name="category_id" placeholder="Категория">
                    <option value="0">Выбрать категорию</option>
                    @foreach ($categoriesList as $c)
                        <option value="{{ $c->id }}" @if ($news->category_id === $c->id) selected @endif>{{ $c->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" id="status" name="status" placeholder="Статус">
                    <option value="DRAFT" @if ($news->status === 'DRAFT') selected @endif>DRAFT</option>
                    <option value="PUBLISHED" @if ($news->status === 'PUBLISHED') selected @endif>PUBLISHED</option>
                    <option value="DELETED" @if ($news->status === 'DELETED') selected @endif>DELETED</option>
                </select>
            </div>
            <div class="form-group">
                <textarea class="form-control" id="description" name="description"
                    placeholder="Описание"> {!! $news->description !!}</textarea>
            </div>
            <button href="#" class="btn btn-primary btn-user btn-block">
                Сохранить
            </button>
        </form>
    </div>
@endsection

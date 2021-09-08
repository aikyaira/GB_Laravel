@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Добавление новости</h1>
        <a href="{{ route('admin.news.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> К списку новостей</a>

    </div>

    <div class="row">
        @include('inc.message')
        <form method="post" class="col-sm-12" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" class="form-control" id="image" name="image" placeholder="Изображение">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Название"
                    value="{{ old('title') }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="text" class="form-control" id="author" name="author" placeholder="Автор"
                    value="{{ old('author') }}">
            </div>
            @error('author')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <select class="form-control" id="category_id" name="category_id" placeholder="Категория">
                    <option value="">Выбрать категорию</option>
                    @foreach ($categoriesList as $c)
                        <option value="{{ $c->id }}" @if (old('category_id') === $c->id) selected @endif>{{ $c->title }}</option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <select class="form-control" id="status" name="status" placeholder="Статус">
                    <option value="DRAFT" @if (old('status') === 'DRAFT') selected @endif>DRAFT</option>
                    <option value="PUBLISHED" @if (old('status') === 'PUBLISHED') selected @endif>PUBLISHED</option>
                    <option value="DELETED" @if (old('status') === 'DELETED') selected @endif>DELETED</option>
                </select>
            </div>
            <div class="form-group">
                <textarea class="form-control" id="description" name="description"
                    placeholder="Описание"> {{ old('description') }}</textarea>
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button href="#" class="btn btn-primary btn-user btn-block">
                Сохранить
            </button>
        </form>
    </div>
@endsection
@push('js')
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script>
            let options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('description', options);
    </script>
@endpush

@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Парсинг новостей</h1>
    </div>

    <div class="row">
        @include('inc.message')
        <form method="post" class="col-sm-12" action="{{ route('admin.parcer.store') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" id="url" name="url" placeholder="URL ресурса"
                    value="{{ old('url') }}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="author" name="author" placeholder="Автор"
                    value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group">
                <select class="form-control" id="category_id" name="category_id" placeholder="Целевая категория парсинга">
                    <option value="">Выбрать категорию</option>
                    @foreach ($categoriesList as $c)
                        <option value="{{ $c->id }}" @if (old('category_id') === $c->id) selected @endif>{{ $c->title }}</option>
                    @endforeach
                </select>
            </div>

            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button href="#" class="btn btn-primary btn-user btn-block">
                Парсить
            </button>
        </form>
    </div>
@endsection

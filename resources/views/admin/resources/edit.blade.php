@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Редактирование ресурса</h1>
    </div>

    <div class="row">
        @include('inc.message')
        <form method="post" class="col-sm-12"
            action="{{ route('admin.resources.update', ['resource' => $resource]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <input type="text" class="form-control" id="url" name="url" placeholder="URL ресурса"
                    value="{{ $resource->url }}">
            </div>
            @error('url')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="text" class="form-control" id="description" name="description" placeholder="Описание ресурса"
                    value="{{ $resource->description }}">
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

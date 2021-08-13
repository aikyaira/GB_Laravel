@extends('layouts.admin')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">Добавление категории</h1>
    <a href="{{ route('admin.categories.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> К списку категорий</a>

</div>

<div class="row">
    <form method="post" class="col-sm-12" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" id="title" name="title" placeholder="Название">
        </div>
        <div class="form-group">
            <textarea class="form-control" id="description" name="description" placeholder="Описание"></textarea>
        </div>
        <button href="#" class="btn btn-primary btn-user btn-block">
            Сохранить
        </button>
    </form>
</div>
@endsection
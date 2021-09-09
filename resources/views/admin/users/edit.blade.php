@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Редактировние пользователя</h1>
        <a href="{{ route('admin.users.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> К списку пользователей</a>

    </div>

    <div class="row">
        @include('inc.message')
        <form method="post" class="col-sm-12" action="{{ route('admin.users.update', ['user' => $user]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Имя"
                    value="{{ $user->name }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                    value="{{ $user->email }}">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group ml-4">
                <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" @if ($user->is_admin) checked @endif>
                <label class="form-check-label" for="is_admin">Админ?</label>
            </div>
            @error('is_admin')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <button href="#" class="btn btn-primary btn-user btn-block">
                Сохранить
            </button>
        </form>
    </div>
@endsection

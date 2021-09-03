@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Редактирование сообщения</h1>
        <a href="{{ route('admin.contacts.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> К списку сообщений</a>

    </div>

    <div class="row">
        @include('inc.message')
        <form method="post" class="col-sm-12" action="{{ route('admin.contacts.update', ['contact' => $contact]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="ФИО"
                    value="{{ $contact->name }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                    value="{{ $contact->email }}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Телефон"
                    value="{{ $contact->phone }}">
            </div>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <textarea class="form-control" id="text" name="text"
                    placeholder="Описание">{!! $contact->text !!}</textarea>
            </div>
            @error('text')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button href="#" class="btn btn-primary btn-user btn-block">
                Сохранить
            </button>
        </form>
    </div>
@endsection

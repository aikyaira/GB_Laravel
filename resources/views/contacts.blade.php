@extends('layouts.main')
@section('title') Контакты - @parent @stop
@section('content')
    <!-- Latest Posts -->
    <main class="posts-listing col-lg-12">
        <div class="container">
            <h2 class=" text-center">Контакты</h2>
            <div class="row">

                <form method="post" class="col-sm-6" action="{{ route('admin.contacts.store') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Имя"
                            value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Телефон"
                            value="{{ old('phone') }}">
                    </div>
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <textarea class="form-control" id="text" name="text"
                            placeholder="Описание">{{ old('text') }}</textarea>
                    </div>
                    @error('text')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Сохранить
                    </button>
                    @include('inc.message')
                </form>
                <div class="col-sm-6">
                    <script type="text/javascript" charset="utf-8" async=""
                                        src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A1136948425d8b05577029fd80c041eec54906d47a048fce02b1b3855946587e6&amp;width=100%25&amp;height=280&amp;lang=ru_RU&amp;scroll=true">
                    </script>
                </div>
            </div>
            @if (isset($message))
                <div class="row">
                    <div class="col-sm-6">
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </main>
@endsection

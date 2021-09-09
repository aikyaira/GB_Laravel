@extends('layouts.main')

@section('content')
    <main class="col-lg-12">
        <div class="container">
            <h1>Привет, {{ Auth::user()->name }}</h1>
            <div class="row">
                <div class="col-md-12">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-success">Пользователь создан с паролем: {{ session()->get('message') }}
                        </div>
                    @endif
                    <p>Это кабинет пользователя</p>
                </div>
                <div class="col-md-12">
                    <p><a href="{{ route('admin.news.index') }}">Перейти в админку</a></p>
                </div>
            </div>
        </div>
    </main>
@endsection

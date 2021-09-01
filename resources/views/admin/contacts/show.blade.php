@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Просмотр сообщения</h1>
        <a href="{{ route('admin.contacts.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> К списку сообщений</a>

    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Сообщение от {{ $contact->created_at }}</h6>
        </div>
        <div class="card-body">
            <p>ФИО: {{ $contact->name }}</p>
            <p class="mb-0">Email: {{ $contact->email }}</p>
            <p class="mb-0">Телефон: {{ $contact->phone }}</p>
            <p class="mb-0">Текст сообщения: {{ $contact->text }}</p>
        </div>
    </div>
  
@endsection

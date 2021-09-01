@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Просмотр заказа</h1>
        <a href="{{ route('admin.orders.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> К списку заказов</a>

    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Заказ от {{ $order->created_at }}</h6>
        </div>
        <div class="card-body">
            <p>ФИО: {{ $order->name }}</p>
            <p class="mb-0">Email: {{ $order->email }}</p>
            <p class="mb-0">Телефон: {{ $order->phone }}</p>
            <p class="mb-0">Текст заказа: {{ $order->text }}</p>
        </div>
    </div>
  
@endsection

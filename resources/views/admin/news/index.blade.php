@extends('layouts.admin')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-2 text-gray-800">Новости</h1>
<a href="{{ route('admin.news.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Добавить новую</a>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Список новостей</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Дата добавления</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Категория</th>
                        <th width="2%">Управление</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Дата добавления</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Категория</th>
                        <th width="2%">Управление</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach( $newsList as $news )
                    <tr>
                        <td>{{ $news['id'] }}</td>
                        <td>{{ now()->format('d-m-Y H:i') }}</td>
                        <td>{{ $news['title'] }}</td>
                        <td>{{ $news['description'] }}</td>
                        <td>{{ $news['categoryid'] }}</td>
                        <td>
                            <a href="{{ route('admin.news.edit', ['news' => $news['id']]) }}" class="btn btn-info btn-circle btn-sm">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-circle btn-sm">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
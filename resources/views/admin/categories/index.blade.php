@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Категории</h1>
        <a href="{{ route('admin.categories.create') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>
            Добавить новую</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Список категорий</h6>
        </div>
        @include('inc.message')
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Дата добавления</th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th width="2%">Управление</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Дата добавления</th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th width="2%">Управление</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($categoriesList as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>@if ($category->updated_at) {{ $category->updated_at->format('d-m-Y H:i') }} @else {{ $category->created_at->format('d-m-Y H:i') }} @endif</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}"
                                        class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="javascript:" rel="{{ $category->id }}"
                                        class="btn btn-danger btn-circle btn-sm delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Категорий нет</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
@push('jsdelete')
    <script type="text/javascript">
        $(function() {
            $(".delete").on('click', function() {
                var id = $(this).attr('rel');
                if (confirm("Вы уверены, что хотите удалить категорию?")) {
                    $.ajax({
                        url: '/admin/categories/' + id,
                        type: 'DELETE',
                        dataType: 'JSON',
                        data: {
                            'id': id,
                            '_token': '{{ csrf_token() }}',
                        },
                        success: function() {
                            alert("Категория удалена");
                            location.reload();
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endpush

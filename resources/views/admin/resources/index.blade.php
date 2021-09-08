@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Ресурсы</h1>
        <a href="{{ route('admin.resources.create') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>
            Добавить ресурс</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Список ресурсов</h6>
        </div>
        @include('inc.message')
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Дата обновления</th>
                            <th>URL</th>
                            <th>Описание</th>
                            <th width="2%">Управление</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Дата обновления</th>
                            <th>URL</th>
                            <th>Описание</th>
                            <th width="2%">Управление</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($resourcesList as $resource)
                            <tr>
                                <td>{{ $resource->id }}</td>
                                <td>@if ($resource->updated_at) {{ $resource->updated_at->format('d-m-Y H:i') }} @else {{ $resource->created_at->format('d-m-Y H:i') }} @endif</td>
                                <td>{{ $resource->url }}</td>
                                <td>{{ $resource->description }}</td>
                                <td>
                                    <a href="{{ route('admin.resources.edit', ['resource' => $resource->id]) }}"
                                        class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="{{ route('admin.resources.parce', ['resource' => $resource->id]) }}"
                                        class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <a href="javascript:" rel="{{ $resource->id }}"
                                        class="btn btn-danger btn-circle btn-sm delete">
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
@push('jsdelete')
    <script type="text/javascript">
        $(function() {
            $(".delete").on('click', function() {
                var id = $(this).attr('rel');
                if (confirm("Вы уверены, что хотите удалить ресурс?")) {
                    $.ajax({
                        url: '/admin/resources/' + id,
                        type: 'DELETE',
                        dataType: 'JSON',
                        data: {
                            'id': id,
                            '_token': '{{ csrf_token() }}',
                        },
                        success: function() {
                            alert("Ресурс удален");
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

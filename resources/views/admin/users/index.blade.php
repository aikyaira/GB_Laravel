@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Пользователи</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Список пользователей</h6>
        </div>
        @include('inc.message')
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Дата регистрации</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Админ?</th>
                            <th width="2%">Управление</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Дата регистрации</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Админ?</th>
                            <th width="2%">Управление</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($usersList as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>@if ($user->updated_at) {{ $user->updated_at->format('d-m-Y H:i') }} @else {{ $user->created_at->format('d-m-Y H:i') }} @endif</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->is_admin ? "Да" : "Нет" }}</td>
                                <td>
                                  <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}"
                                        class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="javascript:" rel="{{ $user->id }}"
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
                if (confirm("Вы уверены, что хотите удалить пользователя?")) {
                    $.ajax({
                        url: '/admin/users/' + id,
                        type: 'DELETE',
                        dataType: 'JSON',
                        data: {
                            'id': id,
                            '_token': '{{ csrf_token() }}',
                        },
                        success: function() {
                            alert("Пользователь удален");
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

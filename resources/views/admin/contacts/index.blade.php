@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Сообщения</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Список сообщений из формы обратной связи</h6>
        </div>
        @include('inc.message')
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Дата добавления</th>
                            <th>ФИО</th>
                            <th>Email</th>
                            <th>Телефон</th>
                            <th>Текст</th>
                            <th width="2%">Управление</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Дата добавления</th>
                            <th>ФИО</th>
                            <th>Email</th>
                            <th>Телефон</th>
                            <th>Текст</th>
                            <th width="2%">Управление</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($contactsList as $contact)
                            <tr>
                                <td>@if ($contact->updated_at) {{ $contact->updated_at->format('d-m-Y H:i') }} @else {{ $contact->created_at->format('d-m-Y H:i') }} @endif</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->text }}</td>
                                <td>
                                    <a href="{{ route('admin.contacts.show', ['contact' => $contact->id]) }}"
                                        class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.contacts.edit', ['contact' => $contact->id]) }}"
                                        class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="javascript:" rel="{{ $contact->id }}"
                                        class="btn btn-danger btn-circle btn-sm delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Сообщений нет</td>
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
                if (confirm("Вы уверены, что хотите удалить сообщение?")) {
                    $.ajax({
                        url: '/admin/contacts/' + id,
                        type: 'DELETE',
                        dataType: 'JSON',
                        data: {
                            'id': id,
                            '_token': '{{ csrf_token() }}',
                        },
                        success: function() {
                            alert("Сообщение удалено");
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
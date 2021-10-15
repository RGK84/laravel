@extends('layouts.admin')

@section('title')
    @parent - Список пользователей
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Список пользователей</h1>

    @include('include.messages')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Почта</th>
                        <th>Дата создания</th>
                        <th>Роль</th>
                        <th>Управление</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usersList as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                @if($user->is_admin) Админ
                                @else Пользователь
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}" class="btn btn-primary">Редакт.</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @empty(!$usersList)
        <!-- Pagination-->
            {!! $usersList->links() !!}
        @endempty
    </div>
@endsection

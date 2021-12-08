@extends('layouts.admin')

@section('title')
    @parent - Редактирование пользователя {{ $user->name }}
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Редактировать пользователя</h1>

    @include('include.messages')
    <form action="{{ route('admin.users.update', ['user' => $user]) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Имя пользователя<em>*</em></label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" autofocus>
        </div>
        <div class="form-group">
            <label for="email">Адрес E-mail<em>*</em></label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select class="form-control" name="is_admin" id="status">
                <option value="0" @if(!$user->is_admin) selected @endif>Пользователь</option>
                <option value="1" @if($user->is_admin) selected @endif>Админ</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a class="btn btn-primary" href="{{ route('admin.users.index') }}">Назад</a>
    </form>
@endsection


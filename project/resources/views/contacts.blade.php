@extends('layouts.main')

@section('title')
	@parent - Обратная связь
@endsection

@section('header')
    <h1 class="fw-bolder">Форма обратной связи</h1>
@endsection

@section('content')
    @include('include.messages')
    <form action="{{ route('contacts.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Введите имя<em>*</em></label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" autofocus>
        </div>
        <div class="form-group">
            <label for="email">Введите email<em>*</em></label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="text">Запрос<em>*</em></label>
            <textarea type="text" name="text" class="form-control" rows="10" id="text">{{ old('text') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection

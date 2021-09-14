@extends('layouts.main')

@section('title')
	@parent - Заказ выгрузки
@endsection

@section('header')
    <h1 class="fw-bolder">Форма заказа на получение выгрузки данных</h1>
@endsection

@section('content')
    <form action="{{ route('order.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Введите имя<em>*</em></label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" autofocus>
        </div>
        <div class="form-group">
            <label for="phone">Введите номер телефона<em>*</em></label>
            <input type="phone" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
        </div>
        <div class="form-group">
            <label for="email">Введите email<em>*</em></label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="text">Напишите комментарий / отзыв<em>*</em></label>
            <textarea type="text" name="text" class="form-control" rows="4" id="text">{{ old('text') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection
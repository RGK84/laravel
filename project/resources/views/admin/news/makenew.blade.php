@extends('layouts.admin')

@section('title')
	@parent - Новая новость
@endsection

@section('content')
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Написать новость</h1>

<form action="#" method="post">
    <div class="form-group">
        <label for="title">Заголовок новости<em>*</em></label>
        <input type="text" class="form-control" id="title" autofocus>
    </div>
    <div class="form-group">
        <label for="text">Текст новости<em>*</em></label>
        <textarea type="password" class="form-control" cols="80" rows="10" id="text"></textarea>
    </div>
    <div class="form-group">
        <label for="full_description">Описание новости<em>*</em></label>
        <input type="text" class="form-control" id="full_description">
    </div>
    <div class="form-group">
        <label for="description">Краткое описание</label>
        <input type="text" class="form-control" id="description">
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
    <a class="btn btn-primary" href="{{ route('admin.news.index') }}">Назад</a>
</form>
@endsection
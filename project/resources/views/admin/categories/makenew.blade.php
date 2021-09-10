@extends('layouts.admin')

@section('title')
	@parent - Новая рубрика
@endsection

@section('content')
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Создать рубрику</h1>

<form action="#" method="post">
    <div class="form-group">
        <label for="title">Название рубрики<em>*</em></label>
        <input type="text" class="form-control" id="title" autofocus>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
    <a class="btn btn-primary" href="{{ route('admin.categories.index') }}">Назад</a>
</form>
@endsection
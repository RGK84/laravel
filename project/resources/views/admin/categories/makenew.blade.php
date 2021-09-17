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
        <input type="text" class="form-control" id="title" value="{{ old('title') }}" autofocus>
    </div>
    <div class="form-group">
        <label for="description">Описание рубрики<em>*</em></label>
        <textarea type="text" name="description" class="form-control" cols="80" rows="10" id="description">{{ old('description') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
    <a class="btn btn-primary" href="{{ route('admin.categories.index') }}">Назад</a>
</form>
@endsection

@extends('layouts.admin')

@section('title')
	@parent - Новая новость
@endsection

@section('content')
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Написать новость</h1>

    <form action="{{ route('admin.news.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Заголовок новости<em>*</em></label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" autofocus>
        </div>
        <div class="form-group">
            <label for="text">Текст новости<em>*</em></label>
            <textarea type="text" name="full_description" class="form-control" cols="80" rows="10" id="text">{{ old('full_description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="description">Краткое описание</label>
            <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a class="btn btn-primary" href="{{ route('admin.news.index') }}">Назад</a>
    </form>
@endsection
@extends('layouts.admin')

@section('title')
	@parent - Новая новость
@endsection

@section('content')
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Написать новость</h1>

    @include('include.messages')
    <form action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="category_id">Категория</label>
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @if(old('category_id') === $category->id) selected @endif>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Заголовок новости<em>*</em></label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" autofocus>
        </div>
        <div class="form-group">
            <label for="description">Текст новости<em>*</em></label>
            <textarea type="text" name="description" class="form-control" cols="80" rows="10" id="description">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Картинка</label>
            <input type="file" class="form-control" name="img" id="image">
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
        </div>
        <div class="form-group">
            <label for="category_id">Источник</label>
            <select class="form-control" name="source_id">
                @foreach($sources as $source)
                    <option value="{{ $source->id }}"
                            @if(old('source_id') === $source->id) selected @endif>{{ $source->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a class="btn btn-primary" href="{{ route('admin.news.index') }}">Назад</a>
    </form>
@endsection

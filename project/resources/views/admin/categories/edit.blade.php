@extends('layouts.admin')

@section('title')
    @parent - Редактирование рубрики {{ $category->id }}
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Создать рубрику</h1>

    @include('include.messages')
    <form action="{{ route('admin.categories.update', ['category' => $category]) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">Название рубрики<em>*</em></label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $category->title }}" autofocus>
        </div>
        <div class="form-group">
            <label for="description">Описание рубрики</label>
            <textarea type="text" name="description" class="form-control" cols="80" rows="10" id="description">{{ $category->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
        <a class="btn btn-primary" href="{{ route('admin.categories.index') }}">Назад</a>
    </form>
@endsection

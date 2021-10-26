@extends('layouts.admin')

@section('title')
    @parent - Редактирование новости {{ $news->id }}
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Редактировать новость </h1>

    @include('include.messages')
    <form action="{{ route('admin.news.update', ['news' => $news]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="category_id">Категория</label>
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @if($news->category_id === $category->id) selected @endif>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
            <div class="form-group">
                <label for="title">Заголовок новости<em>*</em></label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}" autofocus>
            </div>
            <div class="form-group" id="editor">
                <label for="description">Текст новости<em>*</em></label>
                <textarea type="text" name="description" class="form-control" cols="80" rows="10" id="description">{{ $news->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Картинка</label>
                <input type="file" class="form-control" name="img" id="image">
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" name="author" id="author" value="{{ $news->author }}">
            </div>
        <div class="form-group">
            <label for="category_id">Источник</label>
            <select class="form-control" name="source_id">
                @foreach($sources as $source)
                    <option value="{{ $source->id }}"
                            @if($news->source_id === $source->id) selected @endif>{{ $source->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a class="btn btn-primary" href="{{ route('admin.news.index') }}">Назад</a>
    </form>
@endsection

@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush

@extends('layouts.admin')

@section('title')
    @parent - Редактирование ресурса {{ $resource->id }}
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Редактировать ресурс</h1>

    @include('include.messages')
    <form action="{{ route('admin.resources.update', ['resource' => $resource]) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="link">Ссылка на ресурс<em>*</em></label>
            <input type="text" class="form-control" id="link" name="link" value="{{ $resource->link }}" autofocus>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a class="btn btn-primary" href="{{ route('admin.resources.index') }}">Назад</a>
    </form>
@endsection

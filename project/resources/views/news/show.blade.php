@extends('layouts.main')
@section('title')
    @parent - {{ $news->title }}
@endsection

@section('header')
    <h1 class="fw-bolder">{{ $news->title }}</h1>
    <p class="lead mb-0">{{ $news->author }}</p>
@endsection

@section('content')
    <div class="card mb-4">
        <a href="#"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
        <div class="card-body">
            <div class="small text-muted">{{ $news->created_at }}</div>
            <div class="small text-muted"><a href="{{ route('category.show', ['id' => $news->category_id]) }}">{{ $news->category->title }}</a></div>
            <h2 class="card-title">{{ $news->title }}</h2>
            <p class="card-text">{{ $news->description }}</p>
            <a class="btn btn-primary" href="{{ route('news') }}">Назад</a>
        </div>
    </div>
@endsection

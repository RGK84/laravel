@extends('layouts.main')

@section('title')
	@parent
@endsection

@section('header')
    @guest
        <h1 class="fw-bolder">Добро пожаловать на Новостной сайт!</h1>
    @else
        <h1 class="fw-bolder">{{ Auth::user()->name }}, добро пожаловать на Новостной сайт!</h1>
    @endguest
@endsection

@section('content')
    <div class="row">
        <div class="card-body">
            <h2 class="card-title">На текущий момент на сайте представлено:</h2>
        </div>
        <div class="card-body">
            <h2 class="card-title"><a href=<?= route('categories') ?>>Категорий</a>: {{ $categoryCount }}</h2>
        </div>
        <div class="card-body">
            <h2 class="card-title"><a href=<?= route('news') ?>>Статей</a>: {{ $newsCount }}</h2>
        </div>
    </div>
@endsection

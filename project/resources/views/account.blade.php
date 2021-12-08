@extends('layouts.main')

@section('title')
    @parent - Аккаунт
@endsection

@section('header')
    @guest
        <h1 class="fw-bolder">Добро пожаловать на Новостной сайт!</h1>
    @else
        <h1 class="fw-bolder">{{ Auth::user()->name }}, добро пожаловать на Новостной сайт!</h1>
        @if (Auth::user()->avatar)
            <br>
                <img src="{{ Auth::user()->avatar }}" alt="аватар">
            <br>
        @endif
    @endguest
@endsection

@section('content')
    <h2>Вам доступны следующие действия:</h2>
    <div class="row">
        @if(Auth::user()->is_admin)
            <a href="{{ route('admin.index') }}" class="btn btn-primary">В админку</a>
        @endif
        <a href="{{ route('logout') }}" class="btn btn-primary">Выход</a>
    </div>
@endsection

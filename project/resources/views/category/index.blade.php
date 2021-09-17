@extends('layouts.main')

@section('title')
	@parent - Список рубрик
@endsection

@section('header')
    <h1 class="fw-bolder">Список рубрик</h1>
@endsection

@section('content')
	<div class="row">
		@forelse($categoryList as $category)
			<div class="card-body">
				<h2 class="card-title">№ {{ $category->id }}: <a href= {{route('category.show', ['id' => $category->id])}} >{{ $category->title }}</a></h2>
			</div>
		@empty
			<h2 class="card-title">Рубрики еще не утверждены</h2>
		@endforelse
	</div>
@endsection

@extends('layouts.main')

@section('title')
	@parent - Список новостей
@endsection

@section('header')
    <h1 class="fw-bolder">Список новостей</h1>
@endsection

@section('content')
<div class="row">
	@forelse($newsList as $news)
		@if ($loop->first)
			<div class="card mb-4">
				<a href="{{ route('news.show', ['id' => $news->id]) }}"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
				<div class="card-body">
					<div class="small text-muted">{{ $news->created_at }}</div>
					<div class="small text-muted"><a href="{{ route('category.show', ['id' => $news->categoryId]) }}">{{ $news->categoryTitle }}</a></div>
					<h2 class="card-title">{{ $news->title }}</h2>
					<p class="card-text">{{ mb_substr($news->description, 0, 100) }}</p>
					<a class="btn btn-primary" href="{{ route('news.show', ['id' => $news->id]) }}">Прочитать</a>
				</div>
			</div>
			@continue
		@endif
			<div class="col-lg-6">
				<!-- Blog post-->
				<div class="card mb-4">
					<a href="{{ route('news.show', ['id' => $news->id]) }}"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
					<div class="card-body">
						<div class="small text-muted">{{ $news->created_at }}</div>
						<div class="small text-muted"><a href="{{ route('category.show', ['id' => $news->categoryId]) }}">{{ $news->categoryTitle }}</a></div>
						<h2 class="card-title">{{ $news->title }}</h2>
						<p class="card-text">{{ mb_substr($news->description, 0, 100) }}</p>
						<a class="btn btn-primary" href="{{ route('news.show', ['id' => $news->id]) }}">Прочитать</a>
					</div>
				</div>
			</div>

	@empty
		<h2 class="card-title">Статей пока нет</h2>
	@endforelse
	@empty(!$newsList)
		<!-- Pagination-->
		<nav aria-label="Pagination">
			<hr class="my-0" />
			<ul class="pagination justify-content-center my-4">
				<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Назад</a></li>
				<li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item disabled"><a class="page-link" href="#">...</a></li>
				<li class="page-item"><a class="page-link" href="#">15</a></li>
				<li class="page-item"><a class="page-link" href="#">Вперед</a></li>
			</ul>
		</nav>
	@endempty
	</div>
@endsection

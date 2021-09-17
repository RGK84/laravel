@extends('layouts.admin')

@section('title')
	@parent - Список новостей
@endsection

@section('content')
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Список новостей</h1>
	<div class="my-4">
		<a href="{{ route('admin.news.create') }}" class="btn btn-primary">Создать новую</a>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable">
					<thead>
						<tr>
							<th>ID</th>
							<th>Рубрика</th>
							<th>Заголовок</th>
							<th>Описание</th>
                            <th>Источник</th>
							<th>Дата создания</th>
							<th>Управление</th>
						</tr>
					</thead>
					<tbody>
						@forelse($newsList as $news)
							<tr>
								<td>{{ $news->id }}</td>
								<td>{{ $news->categoryTitle }}</td>
								<td>{{ $news->title }}</td>
								<td>{{ mb_substr($news->description, 0, 100) }}</td>
                                <td>{{ $news->sourceTitle }}</td>
								<td>{{ $news->created_at }}</td>
								<td>
									<a href="{{ route('admin.news.edit', ['news' => $news->id]) }}" class="btn btn-primary">Редакт.</a>
									&nbsp;
									<a href="{{ route('admin.news.destroy', ['news' => $news->id]) }}" class="btn btn-primary">Удалить</a>
								</td>
							</tr>
						@empty
							<h2>Новостей нет</h2>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
		@empty(!$newsList)
		<!-- Pagination-->
		<nav aria-label="Pagination">
			<hr class="my-0" />
			<ul class="pagination justify-content-end my-4 mr-3">
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

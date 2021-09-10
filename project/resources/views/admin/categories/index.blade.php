@extends('layouts.admin')

@section('title')
	@parent - Список рубрик
@endsection

@section('content')
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Список рубрик</h1>
	<div class="my-4">
		<a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Создать новую</a>
	</div>	

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Категория</th>
							<th>Управление</th>
						</tr>
					</thead>
					<tbody>
						@forelse($categoryList as $category)
							<tr>
								<td>{{ $category['id'] }}</td>
								<td>{{ $category['title'] }}</td>
								<td>
									<a href="#" class="btn btn-primary">Редакт.</a>
									&nbsp;
									<a href="#" class="btn btn-primary">Удалить</a>
								</td>
							</tr>
						@empty
							<h2>Рубрик нет</h2>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
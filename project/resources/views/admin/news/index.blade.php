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

    @include('include.messages')

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
								<td>{{ $news->category->title }}</td>
								<td>{{ $news->title }}</td>
								<td>{{ mb_substr($news->description, 0, 100) }}</td>
                                <td>{{ $news->source->title }}</td>
								<td>{{ $news->created_at }}</td>
								<td>
									<a href="{{ route('admin.news.edit', ['news' => $news->id]) }}" class="btn btn-primary">Редакт.</a>
									&nbsp;
                                    <a href="javascript:;" class="btn btn-primary delete" rel="{{ $news->id }}">Удалить</a>
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
            {!! $newsList->links() !!}
	@endempty
	</div>
@endsection

@push('js')
    <script>
        $(function() {
            $(".delete").on('click', function() {
                let id = $(this).attr("rel");
                if(confirm("Подтверждаете удаление записи с #ID " + id)) {
                    $.ajax({
                        type: "delete",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/admin/news/" + id,
                        success: function (response) {
                            alert("Запись успешно удалена");
                            console.log(response);
                            location.reload();
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                }
            });
        });
    </script>
@endpush

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

    @include('include.messages')

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable">
					<thead>
						<tr>
							<th>ID</th>
							<th>Категория</th>
                            <th>Кол-во статей</th>
							<th>Управление</th>
						</tr>
					</thead>
					<tbody>
						@forelse($categoryList as $category)
							<tr>
								<td>{{ $category->id }}</td>
								<td>{{ $category->title }}</td>
                                <td>{{ $category->news_count }}</td>
								<td>
									<a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}" class="btn btn-primary">Редакт.</a>
									&nbsp;
                                    <a href="javascript:;" class="btn btn-primary delete" rel="{{ $category->id }}">Удалить</a>
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
                        url: "/admin/categories/" + id,
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

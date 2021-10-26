@extends('layouts.admin')

@section('title')
    @parent - Список ресурсов для парсинга
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Список ресурсов для парсинга</h1>
    <div class="my-4">
        <a href="{{ route('admin.resources.create') }}" class="btn btn-primary">Добавить новый</a>
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
                        <th>Ссылка</th>
                        <th>Дата создания</th>
                        <th>Управление</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($resourceList as $resource)
                        <tr>
                            <td>{{ $resource->id }}</td>
                            <td>{{ $resource->link }}</td>
                            <td>{{ $resource->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.resources.edit', ['resource' => $resource->id]) }}" class="btn btn-primary">Редакт.</a>
                                &nbsp;
                                <a href="javascript:;" class="btn btn-primary delete" rel="{{ $resource->id }}">Удалить</a>
                            </td>
                        </tr>
                    @empty
                        <h2>Ресурсы отсутствуют</h2>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @empty(!$resourceList)
        <!-- Pagination-->
            {!! $resourceList->links() !!}
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
                        url: "/admin/resources/" + id,
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

@extends('layouts.admin')
@section('title') Список новостей @endsection
@section('header')
    <h1 class="h2">Список новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.news.create') }}"
               type="button" class="btn btn-sm btn-outline-secondary">Добавить новость
            </a>
        </div>
        <div id='message' data-type="success" class="note-item-text">{{$message}}</div>
    </div>
@endsection
@section('content')
<div class="table-responsive">
    @include('inc.message')
  <table class="table table-bordered">
            <thead>
               <tr>
                   <th>#ID</th>
                   <th>Заголовок</th>
                   <th>Статус</th>
                   <th>Категория</th>
                   <th>Автор</th>
                   <th>Описание</th>
                   <th>Опции</th>
               </tr>
            </thead>
            <tbody>
              @forelse($data as $news)
                <tr id="{{$news->id}}">
                    <td>{{ $news->id }}</td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->status }}</td>
                    <td>{{ optional($news->category)->title }}</td>
                    <td>{{ $news->author }}</td>
                    <td>{!! $news->description !!}</td>
                    <td>
                        <p class="btn-group">
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.news.edit', ['news' => $news->id]) }}">Редактировать</a> &nbsp;
                            <button class="delete btn btn-sm btn-outline-danger" rel="{{$news->id}}">Удалить</button>
                        </p>
                    </td>
                </tr>
              @empty
                  <tr><td colspan="6">Записей нет</td> </tr>
              @endforelse
            </tbody>
        </table>
        {{ $data->links() }}
    </div>
@endsection
@push('js')
<script>
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.querySelectorAll(".delete");
             el.forEach(function (e, k) {
                 e.addEventListener('click', function() {
                const id = e.getAttribute("rel");
                if (confirm("Подтверждаете удаление записи с #ID =" + id + " ?")) {
                        send('/admin/news/' + id).then(() => {
                            location.reload();
                        });
                    }
                });
            });
        });
        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
</script>
@endpush

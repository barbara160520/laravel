@extends('layouts.admin')
@section('title') Список ресурсов @endsection
@section('header')
    <h1 class="h2">Список ресурсов</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.source.create') }}"
               type="button" class="btn btn-sm btn-outline-secondary">Добавить ресурс
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
                   <th>Адрес</th>
                   <th>Опции</th>
               </tr>
            </thead>
            <tbody>
              @forelse($data as $source)
                <tr id="{{$source->id}}">
                    <td>{{ $source->id }}</td>
                    <td>{{ $source->title }}</td>
                    <td><a href="#">{{$source->url}}</a></td>
                    <td>
                        <p class="btn-group">
                            <button class="delete btn btn-sm btn-outline-danger" rel="{{$source->id}}">Удалить</button>
                        </p>
                    </td>

                </tr>
                <tr><th>Описание</th><td colspan="3">{{ $source->description}}</td></tr>
              @empty
                  <tr><td colspan="4">Записей нет</td> </tr>
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
                        send('/admin/source/' + id).then(() => {
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

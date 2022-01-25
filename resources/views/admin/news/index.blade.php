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
                    <td>{{ $news->category}}</td>
                    <td>{{ $news->author }}</td>
                    <td>{{ $news->description }}</td>
                    <td>
                        <p class="btn-group">
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.news.edit', ['news' => $news->id]) }}">Редактировать</a> &nbsp;
                            <button class="delete btn btn-sm btn-outline-danger" data-id="{{$news->id}}">Удалить</button>
                        </p>
                    </td>
                </tr>
              @empty
                  <tr><td colspan="6">Записей нет</td> </tr>
              @endforelse
            </tbody>
        </table>
    </div>
    <script>
    let buttons = document.querySelectorAll('.delete');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            console.log(id);
            (
                async () => {
                    const response = await fetch('/admin/news/destroy/' + id);
                    const answer = await response.json();
                    document.getElementById(id).remove();
                    document.getElementById('message').style.display = '';
                    document.getElementById('message').innerText = answer.message;
                    setTimeout(function(){
                        document.getElementById('message').style.display = 'none';
                    }, 5000);
                }
            )();
        });
    });
</script>
@endsection

@extends('layouts.admin')
@section('title') Список категорий @endsection
@section('header')
    <h1 class="h2">Список категорий</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.category.create') }}"
               type="button" class="btn btn-sm btn-outline-secondary">Добавить категорию
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
                   <th>Количество новостей</th>
                   <th>Описание</th>
                   <th>Опции</th>
               </tr>
            </thead>
            <tbody>
              @forelse($categories as $category)
                <tr id="{{$category->id}}">
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->news->count() }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <p class="btn-group">
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.category.edit', ['category' => $category]) }}">Редактировать</a> &nbsp;
                            <button class="delete btn btn-sm btn-outline-danger" data-id="{{$category->id}}">Удалить</button>
                        </p>
                    </td>
                </tr>
              @empty
                  <tr><td colspan="6">Записей нет</td> </tr>
              @endforelse
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
<script>
    let buttons = document.querySelectorAll('.delete');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            console.log(id);
            (
                async () => {
                    const response = await fetch('/admin/category/destroy/' + id);
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

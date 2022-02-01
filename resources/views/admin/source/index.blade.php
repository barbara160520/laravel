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
                            <button class="delete btn btn-sm btn-outline-danger" data-id="{{$source->id}}">Удалить</button>
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
    <script>
    let buttons = document.querySelectorAll('.delete');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            console.log(id);
            (
                async () => {
                    const response = await fetch('/admin/source/destroy/' + id);
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

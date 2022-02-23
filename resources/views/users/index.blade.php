@extends('layouts.admin')
@section('title') Список пользователей @endsection
@section('header')
    <h1 class="h2">Список пользователей</h1>
@endsection
@section('content')
<div class="table-responsive">
@include('inc.message')
  <table class="table table-bordered">
            <thead>
               <tr>
                   <th>#ID</th>
                   <th>Имя</th>
                   <th>Статус</th>
                   <th>Опции</th>
               </tr>
            </thead>
            <tbody>
              @forelse($data as $users)
                <tr id="{{$users->id}}">
                    <td>{{ $users->id }}</td>
                    <td>{{ $users->name }}</td>
                    <td>
                        @if ($users->is_admin == 0)
                        <button class='btn btn-sm btn-outline-primary toggleAdmin' data-id="{{$users->id}}"><span id="text{{$users->id}}">Назначить админа</span></button>
                        @else
                        <button class='btn btn-sm btn-outline-primary toggleAdmin' data-id="{{$users->id}}"><span id="text{{$users->id}}">Снять админа</span></button>
                        @endif
                    </td>
                    <td>
                        <p class="btn-group">
                            <button class="delete btn btn-sm btn-outline-danger" rel="{{$users->id}}">Удалить</button>
                        </p>
                    </td>
                </tr>
              @empty
                  <tr><td colspan="6">Записей нет</td> </tr>
              @endforelse
            </tbody>
        </table>
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
                        send('/users/' + id).then(() => {
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


    let toggleBnt = document.querySelectorAll('.toggleAdmin');
    toggleBnt.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            console.log(id);
            (async () => {
                const response = await fetch('/users/toggleAdmin/' + id);
                const answer = await response.json();
                document.getElementById('text' + id).innerText = answer.text;
            })();
        })
    })
</script>
@endpush

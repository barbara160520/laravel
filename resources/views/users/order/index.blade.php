@extends('layouts.admin')
@section('title') Список новостей @endsection
@section('header')
    <h1 class="h2">Заказы</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
@endsection
@section('content')
        <div class="row mb-2">
        @forelse($data as $orderItem)
        <div id="{{$orderItem->id}}" class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0">
                    {{$orderItem->lastName}}
                    {{$orderItem->firstName}}:<br>
                    {{$orderItem->order}}
                </h3>
                <hr class="mb-4">
                <strong class="d-inline-block mb-2 text-primary">
                    {{$orderItem->phone}}<br>
                    {{$orderItem->email}}
                </strong>
                    <div class="mb-1 text-muted">{{now('Europe/Moscow')}}</div>
                    <button class="delete btn btn-sm btn-outline-danger" rel="{{$orderItem->id}}">Удалить</button>
                </div>
            </div>
        </div>
        @empty
	        <h1>Заказов нет</h1>
        @endforelse
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
                        send('/users/order/' + id).then(() => {
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


   /* let buttons = document.querySelectorAll('.delete');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            console.log(id);
            (
                async () => {
                    const response = await fetch('/users/order/destroy/' + id);
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
    });*/
    </script>
@endpush

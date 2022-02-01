@extends('layouts.admin')
@section('title') Список новостей @endsection
@section('header')
    <h1 class="h2">Отзывы</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    <div id='message' data-type="success" class="note-item-text">{{$message}}</div>
    </div>
@endsection
@section('content')
        <div class="row mb-2">
        @forelse($data as $feedbackItem)
        <div id="{{$feedbackItem->id}}" class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                <p class="d-inline-block mb-2 text-primary">
                    {{$feedbackItem->lastName}}
                    {{$feedbackItem->firstName}}
                </p>
                <h3 class="mb-0">{{$feedbackItem->message}}</h3>
                    <div class="mb-1 text-muted">{{$feedbackItem->created_at}}</div>
                </div>
                <button class="delete btn btn-sm btn-outline-danger" data-id="{{$feedbackItem->id}}">Удалить</button>
            </div>

        </div>
        @empty
	        <h1>Отзывов нет</h1>
        @endforelse

        </div>


<script>
    let buttons = document.querySelectorAll('.delete');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            console.log(id);
            (
                async () => {
                    const response = await fetch('/users/feedback/destroy/' + id);
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

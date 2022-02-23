@extends('layouts.admin')
@section('title') Список новостей @endsection
@section('header')
    <h1 class="h2">Отзывы</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

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
                <button class="delete btn btn-sm btn-outline-danger" rel="{{$feedbackItem->id}}">Удалить</button>
            </div>

        </div>
        @empty
	        <h1>Отзывов нет</h1>
        @endforelse
        </div>
@endsection
@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.querySelectorAll(".delete");
             el.forEach(function (e, k) {
                 e.addEventListener('click', function() {
                    const id = e.getAttribute("rel");
                    if (confirm("Подтверждаете удаление записи с #ID =" + id + " ?")) {
                        send('/users/feedback/' + id).then(() => {
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

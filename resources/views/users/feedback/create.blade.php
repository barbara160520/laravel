@extends('layouts.about')
@section('title')Geek news for you brains @parent
@endsection
@section('content')
  <main class="px-3">
  <h4 class="mb-3">Напишите нам</h4>
    @if ($message == "success")
            <x-alert type="success" message="Сообщение отправлено" ></x-alert>
    @endif
    <div>
        <form method="post" action="{{ route('users.feedback.store') }}">
        @csrf
            <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Имя</label>
              <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="{{ old('firstName') }}" required>
              <div class="invalid-feedback">
                Укажите Ваше имя.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Фамилия</label>
              <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="{{ old('lastName') }}" required>
              <div class="invalid-feedback">
              Укажите Вашу фамилию.
              </div>
            </div>

            <div class="col-12">
              <label for="message" class="form-label">Ваше Сообщение</label>
              <textarea type="text" class="form-control" name="message" id="message" placeholder="" required></textarea>
              <div class="invalid-feedback">
                Введите Ваше сообщение.
              </div>
            </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Отправить</button>

        </form>
    </div>
  </main>
@endsection
@section('footer')
<footer class="mt-auto text-white-50"></footer>
@endsection

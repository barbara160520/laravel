@extends('layouts.about')
@section('title')Geek news for you brains @parent
@endsection
@section('content')
  <main class="px-3">
  <h4 class="mb-3">Оформление Заказа</h4>

  <form class="needs-validation"  method="post" action="{{ route('users.order.store') }}">
  @csrf
  <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Имя</label>
              <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="{{ explode(' ',Auth::user()->name)[0] }}" >
              @error('firstName') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Фамилия</label>
              <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="{{ explode(' ',Auth::user()->name)[1] }}" >
              @error('lastName') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted"></span></label>
              <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="you@example.com">
              @error('email') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>

            <div class="col-12">
              <label for="phone" class="form-label">Телефон</label>
              <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+7(928)999-99-99" >
              @error('phone') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>

            <div class="col-12">
              <label for="order" class="form-label">Выбирете заказываемый предмет</label>
              <select class="form-control" name="order" id="order">
                    <option @if(old('order') === 'Альбом') selected @endif>Альбом BTS</option>
                    <option @if(old('order') === 'Диск') selected @endif>Диск BTS</option>
                    <option @if(old('order') === 'Пластинка') selected @endif>Пластинки BTS</option>
                    <option @if(old('order') === 'Фотокарточки') selected @endif>Фотокарточки BTS</option>
                    <option @if(old('order') === 'Постер') selected @endif>Постер BTS</option>
                    <option @if(old('order') === 'Лайтстик') selected @endif>Лайтстик</option>
                </select>
            </div>
          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Продолжить оформление заказа</button>
        </form>

  </main>
@endsection
@section('footer')
<footer class="mt-auto text-white-50"></footer>
@endsection

@extends('layouts.about')
@section('title')Geek news for you brains @parent
@endsection
@section('content')
  <main class="px-3">
  <h4 class="mb-3">Напишите нам</h4>
    @include('inc.message')
    <div>
        <form method="post" action="{{ route('users.feedback.store') }}">
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
              <label for="message" class="form-label">Ваше Сообщение</label>
              <textarea type="text" class="form-control" name="message" id="message" placeholder="" ></textarea>
              @error('message') <strong style="color:red;">{{ $message }}</strong> @enderror
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
@push('js')
    <script>
        ClassicEditor
            .create( document.querySelector( '#message' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush


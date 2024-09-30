@extends('welcome_template')

@section('title', 'Добавить использование')

@section('main_content')
<div class="container">
    <h2 class="text-center mt-5">Добавить использование</h2>

    <form action="{{ route('usage.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="thing_id">Выберите вещь</label>
            <select class="form-control" id="thing_id" name="thing_id">
                @foreach($things as $thing)
                    <option value="{{ $thing->id }}">{{ $thing->name }}</option>
                @endforeach
            </select>
            <li class="text-left mt-3"><a href="/add-item">Добавить вещь</a></li> 
        </div>
        <p></p>
        <div class="form-group">
            <label for="place_id">Выберите место</label>
            <select class="form-control" id="place_id" name="place_id">
                @foreach($places as $place)
                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                @endforeach
            </select>
            <li class="text-left mt-3"><a href="/add-place">Добавить место</a></li> 
        </div>
        <p></p>
        <div class="form-group">
            <label for="user_id">Выберите пользователя</label>
            <select class="form-control" id="user_id" name="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Количество</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
        </div>

        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
    <p class="text-center mt-3"><a href="{{ url()->previous() }}">Назад</a></p>
</div>
@endsection

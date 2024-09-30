@extends('welcome_template')

@section('title')
Добавить место
@endsection

@section('main_content')
<div class="container">
    <h2 class="text-center mt-5">Добавить место</h2>
    <form action="{{ route('add.place.post') }}" method="POST" novalidate>
        @csrf

        <div class="form-group">
            <label for="name">Название места</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>

        <div class="form-group">
            <label for="repair">Ремонт</label>
            <select class="form-control" id="repair" name="repair" required>
                <option value="0">Нет</option>
                <option value="1">Да</option>
            </select>
        </div>

        <div class="form-group">
            <label for="work">Находится в работе</label>
            <select class="form-control" id="work" name="work" required>
                <option value="0">Нет</option>
                <option value="1">Да</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Добавить место</button>
    </form>
    <p class="text-center mt-3"><a href="{{ url()->previous() }}">Назад</a></p>
</div>
@endsection

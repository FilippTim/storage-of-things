@extends('welcome_template')

@section('title')
Добавить вещь
@endsection

@section('main_content')
<div class="container">
    <h2 class="text-center mt-5">Добавить вещь</h2>
    <form action="{{ route('add.item.post') }}" method="POST" novalidate>
        @csrf
        <div class="form-group">
            <label for="name">Имя вещи</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="description">Описание вещи</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>

        <div class="form-group">
            <label for="wrnt">Гарантия/Срок годности</label>
            <input type="date" class="form-control" id="wrnt" name="wrnt" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Добавить вещь</button>
    </form>
    <p class="text-center mt-3"><a href="{{ url()->previous() }}">Назад</a></p>
</div>
@endsection

@extends('welcome_template')

@section('title')
    Редактировать вещь
@endsection

@section('main_content')
<div class="container mt-5">
    <h1 class="text-center">Редактировать вещь</h1>

    <form action="{{ route('things.update', $thing->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Имя</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $thing->name) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control">{{ old('description', $thing->description) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="wrnt">Срок годности</label>
            <input type="date" name="wrnt" class="form-control" value="{{ old('wrnt', $thing->wrnt) }}">
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a href="{{ route('things.index') }}" class="btn btn-secondary">Назад</a>
    </form>
</div>
@endsection

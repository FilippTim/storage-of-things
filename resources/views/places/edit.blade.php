@extends('welcome_template')

@section('title')
    Редактировать место
@endsection

@section('main_content')
<div class="container mt-5">
    <h1 class="text-center">Редактировать место</h1>

    <form action="{{ route('places.update', $place->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Имя</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $place->name) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control">{{ old('description', $place->description) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="repair">Ремонт</label>
            <select class="form-control" id="repair" name="repair" required>
                <option value="{{ old('repair', $place->repair) }}" {{ old('repair', $place->repair) ? 'selected' : '' }}>Прежнее значение</option>
                <option value="0">Нет</option>
                <option value="1">Да</option>
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label for="work">В работе</label>
            <select class="form-control" id="work" name="work" required>
                <option value="{{ old('work', $place->work) }}" {{ old('work', $place->work) ? 'selected' : '' }}>Прежнее значение</option>
                <option value="0">Нет</option>
                <option value="1">Да</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a href="{{ route('places.index') }}" class="btn btn-secondary">Назад</a>
    </form>
</div>
@endsection

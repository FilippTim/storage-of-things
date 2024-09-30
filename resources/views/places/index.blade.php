@extends('welcome_template')

@section('title')
    Все места
@endsection

@section('main_content')
<div class="container mt-5">
    <h1 class="text-center">Все места</h1>
    <a href="/add-place" class="btn btn-primary">Добавить место</a>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($places as $place)
                <tr>
                    <td>{{ $place->name }}</td>
                    <td>{{ $place->description }}</td>
                    <td>
                        <a href="{{ route('places.edit', $place->id) }}" class="btn btn-warning">Редактировать</a>
                        <form action="{{ route('places.destroy', $place->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p class="text-center mt-3"><a href="{{ url()->previous() }}">Назад</a></p>
</div>
@endsection


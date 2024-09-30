@extends('welcome_template')

@section('title')
    Все вещи
@endsection

@section('main_content')
<div class="container mt-5">
    <h1 class="text-center">Все вещи</h1>
    <a href="/add-item" class="btn btn-primary">Добавить вещь</a>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Описание</th>
                <th>Срок годности</th>
                <th>Создатель</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($things as $thing)
                <tr>
                    <td>{{ $thing->name }}</td>
                    <td>{{ $thing->description }}</td>
                    <td>{{ $thing->wrnt }}</td>
                    <td>{{ $thing->user->name }}</td>
                    <td>
                        <!-- Кнопка редактирования -->
                        <a href="{{ route('things.edit', $thing->id) }}" class="btn btn-primary btn-sm">Редактировать</a>

                        <!-- Кнопка удаления с подтверждением -->
                        <form action="{{ route('things.destroy', $thing->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены, что хотите удалить эту вещь?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection




@extends('welcome_template')

@section('title')
    {{ $title }}
@endsection

@section('main_content')
<div class="container mt-5">
    <h1 class="text-center">{{ $title }}</h1>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Описание</th>
                <th>Количество</th>
                <th>Срок годности</th>
                <th>Создатель</th>
                <th>Владелец</th>
                <th>Место</th>
                <th>В работе</th>
                <th>Ремонт</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($things as $use)
                <tr>
                    <td>{{ $use->thing->name }}</td>
                    <td>{{ $use->thing->description }}</td>
                    <td>{{ $use->amount }}</td>
                    <td>{{ $use->thing->wrnt }}</td>
                    <td>{{ $use->thing->user->name }}</td>
                    <td>{{ $use->user->name }}</td>
                    <td>{{ $use->place->name }}</td>
                    <!-- В работе? -->
                    <td>{{ $use->place->work ? 'ДА' : 'НЕТ' }}</td>
                    <!-- Ремонт? -->
                    <td>{{ $use->place->repair ? 'ДА' : 'НЕТ' }}</td>
                    <td>
                        <a href="{{ route('usage.edit', $use->id) }}" class="btn btn-primary btn-sm">Редактировать</a>

                        <form action="{{ route('usage.destroy', $use->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены, что хотите удалить эту запись?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p class="text-center mt-3"><a href="{{ url()->previous() }}">Назад</a></p>
</div>
@endsection

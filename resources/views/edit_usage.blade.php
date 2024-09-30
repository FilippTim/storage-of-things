@extends('welcome_template')

@section('title', 'Редактировать запись')

@section('main_content')
<div class="container mt-5">
    <h1>Редактировать запись</h1>
    <form action="{{ route('usage.update', $usage->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="thing_id">Вещь</label>
            <select name="thing_id" class="form-control" required>
                @foreach($things as $thing)
                    <option value="{{ $thing->id }}" {{ $usage->thing_id == $thing->id ? 'selected' : '' }}>{{ $thing->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="place_id">Место</label>
            <select name="place_id" class="form-control" required>
                @foreach($places as $place)
                    <option value="{{ $place->id }}" {{ $usage->place_id == $place->id ? 'selected' : '' }}>{{ $place->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="user_id">Владелец</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $usage->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Количество</label>
            <input type="number" name="amount" class="form-control" value="{{ $usage->amount }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Сохранить изменения</button>
    </form>
</div>
@endsection

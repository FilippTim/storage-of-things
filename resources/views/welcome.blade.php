@extends('welcome_template')

@section('title')
    Welcome
@endsection

@section('main_content')
<div class="container text-center mt-5 content">
    <h1>Добро пожаловать в систему хранения вещей</h1>
    <p class="lead">Управляйте своими вещами и местами хранения. Делитесь вещами с другими пользователями!</p>
    
    @if(Auth::check())
        <div class="mt-4"></div>
        <a href="{{ route('usage.create') }}" class="btn btn-primary">Добавить использование</a>
        <p></p>
        <a href="{{ route('things.index') }}" class="btn btn-primary">Все вещи</a>
        <a href="{{ route('places.index') }}" class="btn btn-primary">Все места</a>
    @else
        <p>Для продолжения необходимо войти в аккаунт или зарегистрироваться</p>
        <div class="mt-4">
            <a href="/login" class="btn btn-primary">Войти</a>
            <a href="/signup" class="btn btn-secondary">Зарегистрироваться</a>
        </div>
    @endif
</div>
@endsection

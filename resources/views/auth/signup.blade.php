@extends('welcome_template')

@section('title')
Регистрация
@endsection

@section('main_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mt-5">Регистрация</h2>
                <form action="{{ route('signup.post') }}" method="POST" novalidate>
                    @csrf
                    
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Подтвердите пароль</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Зарегистрироваться</button>
                </form>
                <p class="text-center mt-3">Есть аккаунт? <a href="/signup">Войти</a></p>
            </div>
        </div>
    </div>
@endsection
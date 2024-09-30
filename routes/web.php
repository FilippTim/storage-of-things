<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ThingController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\UsageController;

// Главная страница
Route::get('/', function () {return view('welcome');});

// Маршрут для отображения формы регистрации
Route::get('/signup', [AuthController::class, 'create'])->name('signup');
// Маршрут для обработки данных регистрации (POST)
Route::post('/signup', [AuthController::class, 'signUp'])->name('signup.post');

// Маршрут для отображения формы аутентификации
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Маршрут для обработки данных аутентификации (POST)
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
// Маршрут для обработки выхода из аккаунта (POST)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Скрытые роуты
Route::middleware(['auth'])->group(function () {
    // Маршрут для отображения формы добавления вещи
Route::get('/add-item', [ThingController::class, 'create'])->name('add.item');
// Маршрут для обработки формы добавления вещи
Route::post('/add-item', [ThingController::class, 'store'])->name('add.item.post');

// Маршрут для отображения формы добавления места
Route::get('/add-place', [PlaceController::class, 'create'])->name('add.place');
// Маршрут для обработки формы добавления места
Route::post('/add-place', [PlaceController::class, 'store'])->name('add.place.post');

Route::get('/add-usage', [UsageController::class, 'create'])->name('usage.create');
Route::post('/add-usage', [UsageController::class, 'store'])->name('usage.store');
// Маршрут для отображения "Мои вещи"
Route::get('/my-things', [UsageController::class, 'myThings'])->name('my.things');
// Маршрут для отображения "Вещи в ремонте"
Route::get('/repair-things', action: [UsageController::class, 'repairThings'])->name('repair.things');
// Маршрут для отображения "Вещи в работе"
Route::get('/work-things', action: [UsageController::class, 'workThings'])->name('work.things');
// Маршрут для отображения "Gthtlfyys[ dtotq]"
Route::get('/used-things', action: [UsageController::class, 'usedThings'])->name('used.things');
//
Route::get('/all-things', action: [UsageController::class, 'allThings'])->name('all.things');

Route::get('/usages/{id}/edit', [UsageController::class, 'edit'])->name('usage.edit');
Route::put('/usages/{id}', [UsageController::class, 'update'])->name('usage.update');
Route::delete('/usage/{id}', [UsageController::class, 'destroy'])->name('usage.destroy');
//вещи
Route::get('/list_of_things', [ThingController::class, 'index'])->name('things.index');
Route::get('/things/{thing}/edit', [ThingController::class, 'edit'])->name('things.edit');
Route::put('/things/{thing}', [ThingController::class, 'update'])->name('things.update');
Route::delete('/things/{thing}', [ThingController::class, 'destroy'])->name('things.destroy');
//места
Route::get('/list_of_places', [PlaceController::class, 'index'])->name('places.index');
Route::get('/places/{place}/edit', [PlaceController::class, 'edit'])->name('places.edit');
Route::put('/places/{place}', [PlaceController::class, 'update'])->name('places.update');
Route::delete('/places/{place}', [PlaceController::class, 'destroy'])->name('places.destroy');
//Автозаполнение
Route::get('/autocomplete/things', [UsageController::class, 'autocompleteThings'])->name('autocomplete.things');

});
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thing;
use Illuminate\Support\Facades\Auth;

class ThingController extends Controller
{
    public function create()
    {
        return view('add_item'); 
    }
    // Метод для обработки отправленной формы
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'wrnt' => 'required|string|max:255',
        ]);

        // Создание новой записи в таблице things
        Thing::create([
            'name' => $request->name,
            'description' => $request->description,
            'wrnt' => $request->wrnt,
            'master' => Auth::id(), // Устанавливаем создателя вещи
        ]);

        return redirect('/add-usage')->with('success', 'Вещь успешно добавлена!');
    }
    public function index()
    {
        // Получаем все записи из таблицы things
        $things = Thing::all();

        // Возвращаем представление с переданными данными
        return view('things.index', compact('things'));
    }
    public function edit(Thing $thing)
    {
        return view('things.edit', compact('thing'));
    }

    // Метод для обновления данных вещи
    public function update(Request $request, Thing $thing)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'wrnt' => 'nullable|date',
        ]);

        // Обновление данных вещи
        $thing->update($request->all());

        return redirect()->route('things.index')->with('success', 'Вещь успешно обновлена.');
    }

    // Метод для удаления вещи
    public function destroy(Thing $thing)
    {
        $thing->delete();

        return redirect()->route('things.index')->with('success', 'Вещь успешно удалена.');
    }

}

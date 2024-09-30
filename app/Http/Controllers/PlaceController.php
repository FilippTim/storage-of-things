<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    public function create()
    {
        return view('add_place'); // Создайте представление для формы добавления места
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string|max:255',
            'repair' => 'required|boolean',
            'work' => 'required|boolean',
        ]);

        // Создание новой записи в таблице places
        Place::create([
            'name' => $request->name,
            'description' => $request->description,
            'repair' => $request->repair,
            'work' => $request->work,
        ]);

        return redirect('/add-usage')->with('success', 'Место успешно добавлено!');
    }
    public function index()
    {
        $places = Place::all();

        return view('places.index', compact('places'));
    }
    public function edit($id)
    {
        $place = Place::findOrFail($id);
        return view('/places/edit', compact('place')); // Создайте соответствующее представление
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'repair' => 'required|boolean',
            'work' => 'required|boolean',
        ]);

        $place = Place::findOrFail($id);
        $place->update($request->only('name', 'description', 'repair', 'work'));

        return redirect()->route('places.index')->with('success', 'Место успешно обновлено!');
    }
    
    public function destroy($id)
    {
        $place = Place::findOrFail($id);
        $place->delete(); // Удаление записи
        return redirect()->route('places.index')->with('success', 'Место успешно удалено!');
    }
}

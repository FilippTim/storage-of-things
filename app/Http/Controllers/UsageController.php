<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usage;
use App\Models\Thing;
use App\Models\Place;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class UsageController extends Controller
{
    public function create()
    {
        // Получаем все вещи и места для отображения в форме
        $things = Thing::all();
        $places = Place::all();
        $users = User::all();

        return view('add_usage', compact('things', 'places', 'users'));
    }

    public function store(Request $request)
    {
        // Валидация данных формы
        $request->validate([
            'thing_id' => 'required|exists:things,id',
            'place_id' => 'required|exists:places,id',
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|integer',
        ]);

        // Создание новой записи в таблице use (usage)
        Usage::create([
            'thing_id' => $request->thing_id,
            'place_id' => $request->place_id,
            'user_id' => $request->user_id,
            'amount' => $request->amount,
        ]);
        return redirect('/')->with('success', 'Запись успешно добавлена!');
    }
    public function myThings()
    {
        $things = Usage::where('user_id', Auth::id())->with(['thing', 'place'])->get();
        return view('my_things', compact('things'));
    }
    public function repairThings()
    {
        $things = Usage::whereHas('place', function($query) {
            $query->where('repair', true);
        })->with(['thing', 'place'])->get();
        return view('repair_things', compact('things'));
    }
    public function workThings()
    {
        $things = Usage::whereHas('place', function($query) {
            $query->where('work', true);
        })->with(['thing', 'place'])->get();
        return view('work_things', compact('things'));
    }
    public function usedThings()
    {
        $things = Usage::where('user_id', '!=', Auth::id())
        ->whereHas('thing', function($query) {
            $query->where('master', Auth::id());
        })
        ->with(['thing', 'place'])->get();
        return view('used_things', compact('things'));
    }
    public function allThings()
    {
        $things = Usage::with(['thing', 'place'])->get();
        return view('all_things', compact('things'));
    }
    public function edit($id)
    {
        $usage = Usage::findOrFail($id);
        $things = Thing::all();
        $places = Place::all();
        $users = User::all();

        return view('edit_usage', compact('usage', 'things', 'places', 'users'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'thing_id' => 'required|exists:things,id',
            'place_id' => 'required|exists:places,id',
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|integer',
        ]);

        $usage = Usage::findOrFail($id);
        $usage->update([
            'thing_id' => $request->thing_id,
            'place_id' => $request->place_id,
            'user_id' => $request->user_id,
            'amount' => $request->amount,
        ]);

        return redirect('/')->with('success', 'Запись успешно обновлена!');
    }
    public function destroy($id)
    {
        $usage = Usage::findOrFail($id);

        if ($usage->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Вы не можете удалить эту запись.');
        }

        $usage->delete();

        return redirect()->back()->with('success', 'Запись успешно удалена.');
    }
    public function autocompleteThings(Request $request)
    {
        $query = $request->input('query');

        // Найти вещи, соответствующие запросу
        $things = Thing::where('name', 'LIKE', "%{$query}%")
            ->select('id', 'name') // Указываем, какие поля вернуть
            ->get();

        return response()->json($things);
    }

}

<?php
namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // Mostrar todos los animales
    public function index()
    {
        $animales = Animal::all();
        return view('animales.index', compact('animales'));
    }

    // Mostrar formulario para crear un nuevo animal
    public function create()
    {
        return view('animales.create');
    }

    // Almacenar un nuevo animal
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'edad' => 'required|integer',
            'color' => 'required|string|max:255',
        ]);

        Animal::create($request->all());

        return redirect()->route('animales.index')->with('success', 'Animal creado exitosamente');
    }

    // Mostrar el formulario para editar un animal
    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        return view('animales.edit', compact('animal'));
    }

    // Actualizar un animal
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'edad' => 'required|integer',
            'color' => 'required|string|max:255',
        ]);

        $animal = Animal::findOrFail($id);
        $animal->update($request->all());

        return redirect()->route('animales.index')->with('success', 'Animal actualizado exitosamente');
    }

    // Eliminar un animal
    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();

        return redirect()->route('animales.index')->with('success', 'Animal eliminado exitosamente');
    }

    // Mostrar los detalles de un animal
    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        return view('animales.show', compact('animal'));
    }
}

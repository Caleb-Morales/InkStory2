<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $listaCat = Categoria::all();
        return view('categorias.index', ['listaCat' => $listaCat]);
    }

    public function store(Request $r)
    {
        // Validate the request
        $r->validate([
            'nombre' => 'required|string|max:255|unique:categorias',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $cat = new Categoria();
        $cat->nombre = $r->input("nombre");
        $cat->img = $r->img->store('images', 'pub');
        $cat->save();

        return redirect('/categorias');
    }

    public function edit($id)
    {
        $cat = Categoria::find($id);
        return view('categorias.edit', ['cat' => $cat]);
    }

    public function putedit(Request $r, $id)
    {
        // Validate the request
        $r->validate([
            'nombre' => 'required|string|max:255',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $cat = Categoria::find($id);
        $cat->nombre = $r->nombre;

        if ($r->hasFile('img')) {
            $cat->img = $r->img->store('images', 'pub');
        }

        $cat->save();
        return redirect('/categorias');
    }

    public function delete($id)
    {
        $cat = Categoria::find($id);

        if (!$cat) {
            return redirect('/categorias')->with('error', 'La categoría no existe.');
        }

        $cat->delete();

        return redirect('/categorias')->with('success', 'Categoría eliminada correctamente.');
    }
}

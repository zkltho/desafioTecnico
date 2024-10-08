<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $usuarios = Usuario::paginate();

        return view('usuario.index', compact('usuarios'))
            ->with('i', ($request->input('page', 1) - 1) * $usuarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $usuario = new Usuario();

        $response = Http::get('https://randomuser.me/api/');
        $data = $response->json()['results'][0];
    
        // Extraer los datos del usuario de la API
        $usuarioData = [
            'first_name' => $data['name']['first'],
            'last_name' => $data['name']['last'],
            'age' => $data['dob']['age'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'country' => $data['location']['country'],
            'city' => $data['location']['city'],
            'picture_large' => $data['picture']['large'],
        ];

        return view('usuario.create', compact('usuarioData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $request): RedirectResponse
    {
        Usuario::create($request->validated());

        return Redirect::route('usuarios.index')
            ->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $usuario = Usuario::find($id);

        return view('usuario.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $usuario = Usuario::find($id);

        return view('usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioRequest $request, Usuario $usuario): RedirectResponse
    {
        $usuario->update($request->validated());

        return Redirect::route('usuarios.index')
            ->with('success', 'Usuario editado correctamente');
    }

    public function destroy($id): RedirectResponse
    {
        Usuario::find($id)->delete();

        return Redirect::route('usuarios.index')
            ->with('success', 'Usuario eliminado correctamente');
    }
}

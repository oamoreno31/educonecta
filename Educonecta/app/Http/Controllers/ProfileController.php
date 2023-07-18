<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id
            // Agrega aquí las validaciones para los campos que desees actualizar
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->documentType = $request->documentType;
        $user->documentId = $request->documentId;

        // Actualiza aquí los demás campos que desees modificar

        $user->save();

        return redirect()->route('profile.edit')
            ->with('success', 'Perfil actualizado correctamente.');
    }
}

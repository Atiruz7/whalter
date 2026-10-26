<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Muestra los datos del administrador y el formulario para editarlos.
     */
    public function edit(Request $request): View
    {
        return view('admin.profile', [
            'admin' => $request->user(),
        ]);
    }

    /**
     * Actualiza nombre, correo y contraseña del administrador.
     */
    public function update(Request $request): RedirectResponse
    {
        $admin = $request->user();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($admin->id)],
            'current_password' => ['nullable', 'required_with:password', 'string', 'current_password'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.current_password' => 'La contraseña actual no es correcta.',
            'password.min' => 'La nueva contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
        ], [
            'name' => 'nombre',
            'email' => 'correo electrónico',
            'current_password' => 'contraseña actual',
            'password' => 'nueva contraseña',
        ]);

        $admin->name = $data['name'];
        $admin->email = $data['email'];

        if (! empty($data['password'])) {
            $admin->password = Hash::make($data['password']);
        }

        $admin->save();

        return redirect()
            ->route('admin.profile.edit')
            ->with('status', 'Datos actualizados correctamente.');
    }
}

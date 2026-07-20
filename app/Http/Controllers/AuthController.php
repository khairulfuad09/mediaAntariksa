<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function Logout()
    {
        auth()->logout();
        return redirect()->route("welcome.index");
    }

    public function dashboard()
    {
        return view("pages.dashboard");
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|max:255",
            "kelas" => "required|string|max:255",
            "identity" => "required|string|max:255",
            "password" => "nullable|string|min:6", // password boleh kosong
        ]);

        $user = auth()->user();

        // Update data biasa
        $user->name = $request->name;
        $user->email = $request->email;
        $user->kelas = $request->kelas;
        $user->identity = $request->identity;

        // Kalau ada password baru, update sekalian
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'User updated successfully!');

    }

}

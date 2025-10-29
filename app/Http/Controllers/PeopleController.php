<?php

namespace App\Http\Controllers;

use App\Models\Peoples;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PeopleController extends Controller
{
    public function index()
    {
        $users = Peoples::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:peoples,email',
            'date' => 'required|date',
            'profile_picture' => 'nullable|image|max:2048', // max 2MB
        ]);

        $data = $request->only('name', 'email', 'date');

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data['profile_picture'] = $path;
        }

        Peoples::create($data);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(Peoples $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(Peoples $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, Peoples $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:peoples,email,{$user->id}",
            'date' => 'required|date',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('name', 'email', 'date');

        if ($request->hasFile('profile_picture')) {
            // Delete old picture if exists
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data['profile_picture'] = $path;
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(Peoples $user)
    {
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}

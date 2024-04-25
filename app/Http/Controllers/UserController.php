<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //index
    public function index()
    {
        $usersQuery = User::query()
        ->select('id', 'name', 'email', 'phone','position','created_at') // Include necessary columns
        ->when(request('name'), function ($query, $name) {
            // Search by name if name parameter exists in the request
            $query->where('name', 'like', '%' . $name . '%');
        })
        ->latest('id'); // Order by latest id

    $users = $usersQuery->paginate(10);

    return view('pages.users.index', compact('users'));
    }
//create
    public function create()
    {
        return view('pages.users.create');
    }

    //store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'role' => 'required',
            'password' => 'required|min:8',
            'position' => 'required',
            'departement' => 'required',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'role' => $validatedData['role'],
            'password' => Hash::make($validatedData['password']),
            'position' => $validatedData['position'],
            'departement' => $validatedData['departement'],
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    //edit
    public function edit(User $user)
    {
        return view('pages.users.edit', compact('user'));
    }
    //update
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required',
            'role' => 'required',
            'position' => 'required',
            'departement' => 'required',

        ]);

        $user->update($validatedData);

        //if password is not empty, update password
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
//destroy
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}

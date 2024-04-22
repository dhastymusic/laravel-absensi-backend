<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //index
    public function index()
    {
        $usersQuery = User::query()
        ->select('id', 'name', 'email', 'phone', 'created_at') // Include necessary columns
        ->when(request('name'), function ($query, $name) {
            // Search by name if name parameter exists in the request
            $query->where('name', 'like', '%' . $name . '%');
        })
        ->latest('id'); // Order by latest id

    $users = $usersQuery->paginate(10);

    return view('pages.users.index', compact('users'));
    }

}

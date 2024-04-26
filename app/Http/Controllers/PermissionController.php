<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    //index
    public function index(Request $request)
    {
        $permissions = Permission::with('user')->when($request->input('name'), function ($query, $name) {
            $query->whereHas('user', function ($query) use ($name) {
                $query->where('name', 'like', "%$name%");
            });
        })->when($request->input('status'), function ($query, $status) {
            $query->where('status', $status);
        })->latest()->paginate(10)->withQueryString();

        return view('pages.permission.index', compact('permissions'));
    }


    //show
    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return view('pages.permission.show', compact('permission'));
    }
    //edit
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('pages.permission.edit', compact('permission'));
    }
    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);
        $permission = Permission::findOrFail($id);
        $permission->update($request->only('status'));

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully');
    }
}

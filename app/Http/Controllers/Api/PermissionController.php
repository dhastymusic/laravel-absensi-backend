<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    //create
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'reason' => 'required',

        ]);

        $permission = new Permission();
        $permission->user_id = $request->user()->id;
        $permission->date_permission = $request->date;
        $permission->reason = $request->reason;
        $permission->status = "pending";

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/permissions', $image->hashName());
            $permission->image = $request->image->hashName();
        }

        $permission->save();

        return response()->json(['message' => 'Permission Create Succesfully', 'permission' => $permission], 201);
    }

}

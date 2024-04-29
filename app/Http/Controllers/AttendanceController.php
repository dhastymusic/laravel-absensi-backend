<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    //index
    public function index(Request $request)
    {
        $attendances = Attendance::with('user')
            ->when(request()->q, function($query) {
                $query->where('name', 'LIKE', '%' . request()->q . '%');
            })
            ->paginate(10);
        return view('pages.absensi.index', compact('attendances'));
    }
    //edit
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        return view('pages.absensi.edit', compact('attendance'));
    }
    //show
    public function show($id)
    {
        $attendance = Attendance::findOrFail($id);
        return view('pages.absensi.show', compact('attendance'));
    }
    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required', //add this line
            'time_in' => 'required',
            'time_out' => 'required',
        ]);
        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->only('date','time_in', 'time_out'));

        return redirect()->route('attendances.index')->with('success', 'Attendance updated successfully');
    }


}

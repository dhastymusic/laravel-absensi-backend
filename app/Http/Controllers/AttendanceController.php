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
}

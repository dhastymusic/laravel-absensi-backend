<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;


class AttendanceController extends Controller
{
    //check in
    public function checkIn(Request $request)
    {
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        // Save check-in data
        $attendance = new Attendance();
        $attendance->user_id = $request->user()->id;
        $attendance->date = date('Y-m-d');
        $attendance->time_in = date('H:i:s', strtotime('+7 hour'));
        $attendance->latlon_in = $request->latitude . ',' . $request->longitude;
        $attendance->save();

        return response()->json([
            'message' => 'Check-in success',
            'attendance' => $attendance
        ], 200);
    }

     //checkout
     public function checkout(Request $request)
     {
         //validate lat and long
         $request->validate([
             'latitude' => 'required',
             'longitude' => 'required',
         ]);

         //get today attendance
         $attendance = Attendance::where('user_id', $request->user()->id)
             ->where('date', date('Y-m-d'))
             ->first();

         //check if attendance not found
         if (!$attendance) {
             return response(['message' => 'Checkin first'], 400);
         }

         //save checkout
         $attendance->time_out = date('H:i:s', strtotime('+7 hour'));
         $attendance->latlon_out = $request->latitude . ',' . $request->longitude;
         $attendance->save();

         return response()->json([
             'message' => 'Check-out success',
             'attendance' => $attendance
         ], 200);
     }
     //is checkin
        public function isCheckIn(Request $request)
        {
            //get today attendance
            $attendance = Attendance::where('user_id', $request->user()->id)
                ->where('date', date('Y-m-d'))
                ->first();

            return response()->json([
                'is_checkin' => $attendance ? true : false,
            ], 200);
        }
}

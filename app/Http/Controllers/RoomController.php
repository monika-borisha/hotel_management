<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
{
    public function room_detail($id)
    {

        $rooms = Room::find($id);

    // Log::info($rooms);
        if (!$rooms) {
            // Optionally, return a 404 error or redirect with a message
            abort(404, 'Room not found');
        }
        return view('home.room_details',compact('rooms'));
    }

    public function book_room(Request $request, $id)
    {
        // Validate the booking request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        $checkin = $request->check_in;
        $checkout = $request->check_out;
        $isbooked = Booking::where('room_id', $id)
            ->where(function($query) use ($checkin, $checkout) {
                $query->whereBetween('check_in', [$checkin, $checkout])
                      ->orWhereBetween('check_out', [$checkin, $checkout])
                      ->orWhere(function($query) use ($checkin, $checkout) {
                          $query->where('check_in', '<=', $checkin)
                                ->where('check_out', '>=', $checkout);
                      });
            })
            ->exists();

        if ($isbooked) {
            return redirect()->back()->with('message', 'Room Already Booked, Please Select Another Room');
        }

        $data = new Booking;
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->contact = $request->contact;
        $data->check_in = date('Y-m-d', strtotime($request->check_in));
        $data->check_out = date('Y-m-d', strtotime($request->check_out));
        $data->save();

        return redirect()->back()->with('message', 'Room Booked Successfully');
    }

  
}

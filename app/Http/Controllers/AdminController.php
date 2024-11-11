<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
Use illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home()
    {
         $rooms = Room::all();
        return view('home.index',compact('rooms'));

    }
    public function index()
    {
        if(Auth::id())
        {
            $usertype  = Auth::user()->usertype;

            if($usertype == 'user')
            {
                $rooms = Room::all();
                return view('home.index',compact('rooms'));
            }
            else if($usertype == 'admin')
            {
                return view('admin.index');
            }
            else{
                return redirect()->back();
            }
        }
    }

    public function create(){

        return view('admin.add_room');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'price' => 'required|numeric',
            'amenities' => 'required|array',
            'room_type' => 'required',
        ]);

        $data= new Room($request->all());

        if($request->has('amenities'))
        {
            $amenities=implode(',',$request->amenities);
        }


        if($request->has('image'))
        {
            $images = $request->file('image');
            $filename = time() . '.' . $images->getClientOriginalExtension();
            $images->move(\public_path('image/'), $filename);
            $images = $filename;
        }

        Room::create([
            "room_title"=> $data->room_title,
            "room_type"=> $data->room_type,
            "description"=>$data->description,
            "image"=>$filename,
            "amenities"=>$amenities,
            "price"=>$data->price,
       ]);
        return redirect()->route('view.room')->with('message', 'Room Added Successfully');
    }

    public function view_room()
    {
        $rooms = Room::all();

        return view('admin.view_room',compact('rooms'));

    }

    public function edit_room($id)
    {

        $edit = Room::find($id);
        return view('admin.add_room',compact('edit'));
    }

    public function update_room(Request $request,$id)
    {

        $request->validate([
            'room_title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'price' => 'required|numeric',
            'amenities' => 'required|array',
            'room_type' => 'required',
        ]);

        $room = Room::find($id);
        if (!$room) {
            return redirect()->back()->with('error', 'Room not found.');
        }

        if($request->has('amenities'))
        {
            $amenities=implode(',',$request->amenities);
        }

// Handle image upload only if a new image is provided
$filename = $room->image; // Keep existing image by default
if ($request->hasFile('image')) {
    $image = $request->file('image');
    $filename = time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('image/'), $filename);
}


        $room->update([
            "room_title"=> $request->room_title,
            "room_type"=> $request->room_type,
            "description"=>$request->description,
            "image"=>$filename,
            "amenities"=>$amenities,
            "price"=>$request->price,
       ]);
        return redirect()->route('view.room')->with('message', 'Room Added Successfully');
    }

    public function destroy($id)
    {

    $room = Room::find($id);
    if ($room) {
        $room->delete();
        return redirect()->back()->with('success', 'Room deleted successfully.');
    }
    return redirect()->back()->with('error', 'Room not found.');
    }

    public function booking(){

        $bookings = Booking::all();

        return view('admin.booking',compact('bookings'));

    }

    public function delete_booking($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->delete();
            return redirect()->back()->with('success', 'Booking deleted successfully.');
        }
        return redirect()->back()->with('error', 'Booking not found.');
    }

}


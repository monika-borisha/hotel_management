<div class="our_room">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Our Rooms</h2>
                <p>Lorem Ipsum available, but the majority have suffered</p>
             </div>
          </div>
       </div>

       <div class="row">
           @foreach ($rooms as $room)
           <div class="col-md-4 col-sm-6 mb-4">
              <div id="serv_hover" class="room">
                 <div class="room_img">
                    <figure><img src="{{ asset('image/' . $room->image) }}" alt="Room Image" class="img-fluid"/></figure>
                 </div>
                 <div class="bed_room">
                    <h3>{{ $room->room_title }}</h3>
                    <p style="padding: 10px"> {{ Str::limit($room->description, 100) }} </p>

                    <a href="/room-detail/{{$room->id}}" class="btn btn-success">Room Details </a>
                    {{-- <a href="{{ route('room.detail', $room->id) }}">View Details</a> --}}
                 </div>
              </div>
           </div>
           @endforeach

       </div>
    </div>
</div>


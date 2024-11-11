<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <title>Document</title>
    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
            font-size: 17px;
            font-weight: bold;
        }

        input {
            width: 100%;
        }
    </style>
</head>

<body class="main-layout">
    {{-- loader --}}
    {{-- <div class="loader_bg">
    <div class="loader"><img src = "{{ asset('images/loading.gif') }}" alt ="#"></div>
    </div> --}}
    <header>
        @include('home.header')
    </header>

    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Room</h2>
                        <p>Lorem Ipsum available, but the majority have suffered</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div id="serv_hover" class="room">
                        <div style="padding: 20px" class="room_img">
                            <figure><img src="/image/{{ $rooms->image }}" class="img-fluid" /></figure>
                        </div>
                        <div class="bed_room">
                            <h2>{{ $rooms->room_title }}</h2>
                            <p style="padding: 10px"> {{ Str::limit($rooms->description, 100) }} </p>
                            <h4 style="padding: 12px">Room Type: {{ $rooms->room_type }}</h4>
                            <h4 style="padding: 12px">Amenities: {{ $rooms->amenities }}</h4>
                            <h3 style="padding: 12px">Price: {{ $rooms->price }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <h1 style="font-size: 40px; font-weight: 500">Book Room</h1>

                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <li>
                                <div class="alert alert-danger">
                                    {{ $error }}
                                </div>
                            </li>
                        @endforeach
                    @endif

                    <form action="{{ route('book.room', $rooms->id) }}" method="POST">
                        @csrf
                        <div>
                            <label>Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ Auth::check() ? Auth::user()->name : '' }}" placeholder="Enter your name">
                        </div>

                        <div class="mt-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ Auth::check() ? Auth::user()->email : '' }}" placeholder="Enter your Email">
                        </div>

                        <div class="mt-3">
                            <label>Contact No.</label>
                            <input type="text" name="contact" class="form-control"
                                value="{{ Auth::check() ? Auth::user()->phone : '' }}" placeholder="Enter your Contact Number">
                        </div>

                        <div class="mt-3">
                            <label>Check In</label>
                            <input type="date" name="check_in" class="form-control">
                        </div>

                        <div class="mt-3">
                            <label>Check Out</label>
                            <input type="date" name="check_out" class="form-control">
                        </div>

                        <div class="mt-4">
                            <input type="submit" value="Book Room" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('home.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

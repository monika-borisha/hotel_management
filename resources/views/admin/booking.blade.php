<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Bootstrap CSS-->
     <link rel="stylesheet" href="admin/vendor/bootstrap/css/bootstrap.min.css">
     <!-- Font Awesome CSS-->
     <link rel="stylesheet" href="admin/vendor/font-awesome/css/font-awesome.min.css">
     <!-- Custom Font Icons CSS-->
     <link rel="stylesheet" href="admin/css/font.css">
     <!-- Google fonts - Muli-->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
     <!-- theme stylesheet-->
     <link rel="stylesheet" href="admin/css/style.default.css" id="theme-stylesheet">
     <!-- Custom stylesheet - for your changes-->
     <link rel="stylesheet" href="admin/css/custom.css">
     <!-- Favicon-->
     <link rel="shortcut icon" href="admin/img/favicon.ico">
    <title>Document</title>
</head>
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
       @include('admin.sidebar')


        <div class="page-content">
            <div class="page-header">
              <div class="container-fluid">

                <ul class="breadcrumb p-0">
                    <h5><i class="fa fa-list mr-2"></i></h5>
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Bookings</li>
                </ul>

              </div>
            </div>

            <div class="title p-2  mb-3">
                <h1 class="ml-3 ">Bookings</h1>
            </div>

                <div class="container-fluid">
                    <table class="table">
                        <thead  style="font-size:20px"; >
                          <tr>
                            <th scope="col">Room ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Room Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Check In</th>
                            <th scope="col">Check Out</th>
                            <th scope="col">Status</th>
                            <th scope="col">Delete</th>

                          </tr>
                        </thead>
                        <tbody >
                            @foreach($bookings as $booking)
                            <tr>
                                <th scope="row">{{$booking->room_id}}</th>
                                <td>{{$booking->name}}</td>
                                <td>{{$booking->email}}</td>
                                <td>{{$booking->contact}}</td>
                                <td>{{$booking->room->room_title}}</td>
                                <td>{{$booking->room->price}}</td>
                                <td><img src = " {{asset('image/'.$booking->room->image)}}" width="150px" height="150px"></td>
                                <td>{{$booking->check_in}}</td>
                                <td>{{$booking->check_out}}</td>
                                <td>{{$booking->status}}</td>
                                <td><a onclick="return confirm('Are you sure you want to delete?')"href= "/delete-booking/{{$booking->id}}" class=" btn btn-danger">Delete</td>


                                </tr>
                            @endforeach
                        </tbody>


                </div>


              </div>
            </div>

        @include('admin.footer')


    </div>
</body>
</html>

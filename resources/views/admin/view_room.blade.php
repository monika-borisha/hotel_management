<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="admin/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="admin/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS -->
    <link rel="stylesheet" href="admin/css/font.css">
    <!-- Google fonts - Muli -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- Theme stylesheet -->
    <link rel="stylesheet" href="admin/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes -->
    <link rel="stylesheet" href="admin/css/custom.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="admin/img/favicon.ico">
    <!-- Bootstrap JS (for interactivity) -->
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Tweaks for older IEs -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation -->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end -->

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <!-- Breadcrumb -->
            <ul class="breadcrumb p-0">
                <h5><i class="fa fa-list mr-2"></i></h5>
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">View Rooms</li>
            </ul>
          </div>
        </div>
        <h1 class="ml-3">View Rooms</h1>
        @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $message)
              <li>{{ $message }}</li>
            @endforeach
          </ul>
        </div>
      @endif

        <div class="container-fluid">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Room Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Room Type</th>
                    <th scope="col">Amenities</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                  </tr>

                </thead>
                <tbody>
                    @foreach($rooms as $room)
                    <tr>
                        <th scope="row">{{$room->id}}</th>
                        <td>{{$room->room_title}}</td>
                        <td>{!! Str::limit($room->description,100) !!}</td>
                        <td>{{$room->room_type}}</td>
                        <td>{{$room->amenities}}</td>
                        <td><img src="/image/{{$room->image}}" height="100px" width="100px"></td>
                        <td>{{$room->price}}</td>
                        <td><a  href= "/edit-room/{{$room->id}}" class=" btn btn-warning">Edit</td>
                        <td><a onclick="return confirm('Are you sure you want to delete?')"href= "/delete-room/{{$room->id}}" class=" btn btn-danger">Delete</td>


                        </tr>
                    @endforeach
                </tbody>


        </div>


      </div>
    </div>
    @include('admin.footer')
  </body>
</html>

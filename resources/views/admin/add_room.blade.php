<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../admin/vendor/bootstrap/css/bootstrap.min.css">
    <script src="../admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../admin/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../admin/css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="../admin/css/custom.css">
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <ul class="breadcrumb p-0">
                        <h5><i class="fa fa-list mr-2"></i></h5>
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ isset($edit->id) ? 'Edit Room' : 'Add Room' }}</li>
                    </ul>
                </div>
            </div>
            <div class="container-fluid mb-4">

                <h1 class="title">{{ isset($edit->id) ? 'Edit Room' : 'Add Room' }}</h1>

                <form method="POST"
                    action="{{ isset($edit->id) ? route('update_room', $edit->id) : route('add.room') }}"
                    enctype="multipart/form-data">
                    @csrf

                    @if (isset($edit->id))
                        @method('PUT') <!-- This line tells Laravel to treat this as a PUT request -->
                    @endif
                    <div>
                        <label>Room Title</label>
                        <input type="text" class="form-control" name="room_title" placeholder="Enter Room Title"
                            value="{{ $edit->room_title ?? '' }}">
                        @error('room_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <label class="mt-3">Room Type</label>
                        <select class="form-control" name="room_type">
                            <option value="" selected>Select Room Type</option>
                            <option value="Regular"
                                {{ isset($edit->room_type) && $edit->room_type == 'Regular' ? 'selected' : '' }}>
                                Regular</option>
                            <option value="Deluxe"
                                {{ isset($edit->room_type) && $edit->room_type == 'Deluxe' ? 'selected' : '' }}>Deluxe
                            </option>
                            <option value="Superior"
                                {{ isset($edit->room_type) && $edit->room_type == 'Superior' ? 'selected' : '' }}>
                                Superior</option>
                            <option value="Premium"
                                {{ isset($edit->room_type) && $edit->room_type == 'Premium' ? 'selected' : '' }}>
                                Premium</option>
                        </select>
                        @error('room_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <label class="mt-3">Amenitites </label>
                        <?php $amenities = isset($edit->amenities) ? explode(',', $edit->amenities) : []; ?>

                        <select class="form-control" name="amenities[]" multiple>
                            <option disabled>Select Amenities</option>
                            <option value="wi-fi" {{ in_array('wi-fi', $amenities) ? 'selected' : '' }}>Wi-Fi</option>
                            <option value="pool" {{ in_array('pool', $amenities) ? 'selected' : '' }}>Pool</option>
                            <option value="gym" {{ in_array('gym', $amenities) ? 'selected' : '' }}>Gym</option>
                            <option value="theater" {{ in_array('theater', $amenities) ? 'selected' : '' }}>Theater
                            </option>
                            <option value="tv" {{ in_array('tv', $amenities) ? 'selected' : '' }}>TV</option>
                        </select>

                        @error('amenities')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <label class="mt-3">Description</label>
                        <textarea class="form-control" name="description" spellcheck="true">{{ $edit->description ?? '' }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <label class="mt-3">Price</label>
                        <input type="number" class="form-control" name="price" placeholder="Enter Price"
                            value="{{ $edit->price ?? '' }}">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>

                        <label class="mt-3 mb-3">Image</label>
                        @if (!empty($edit) && !empty($edit->image))
                            <img src="{{ asset('image/' . $edit->image) }}" width="200">
                        @else
                            <p>No image available.</p>
                        @endif
                        <input type="file" class="form-control mt-2" name="image">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <button type="submit"
                            class="btn btn-primary mt-4">{{ isset($edit->id) ? 'Update Room' : 'Add Room' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.footer')
</body>

</html>

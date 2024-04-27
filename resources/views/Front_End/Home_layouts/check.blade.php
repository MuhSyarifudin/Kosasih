    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow  rounded text-center p-2">
                <h5 class="mb-3 text-center">Check Booking Availability</h5>
                <form action="{{route ('check.availability')}}" method="POST">
                    @csrf
                    <div class="row justify-content-center align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Date</label>
                            <input type="date" class="form-control shadow-none" name="tanggal" required>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Homestay</label>
                            <select class="form-select shadow-none" name="homestay">
                                <option value="0">Pilih Homestay</option>
                                @foreach($homestays as $homestay)
                                <option value="{{ $homestay->id }}">{{ $homestay->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Rooms</label>
                            <select class="form-select shadow-none" name="roomCount">
                                <option value="0" selected>Select Room Type</option>
                                @foreach($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->nama }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Capacity</label>
                            <select class="form-select shadow-none" name="adultCount">
                                <option value="0" selected>Select Capacity</option>
                                @foreach($uniqueCapacities as $capacity)
                                <option value="{{ $capacity }}">
                                    {{ $capacity }} <i class="bi bi-person"></i>
                                </option>
                                @endforeach
                            </select>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-lg-3 mr-2">
                            <button type="submit" class="btn text-white bg-custom"><i class="bi bi-search"></i>
                                Cari</button>
                        </div>
                    </div>
                </form>
                @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger mt-3">
                    {{ session('error') }}
                </div>
                @endif

                @if(isset($isRoomAvailable))
                @if($isRoomAvailable)
                <div class="alert alert-success mt-3">
                    Room is available. You can proceed with booking.
                </div>
                @else
                <div class="alert alert-danger mt-3">
                    Room is not available for the specified date and requirements.
                </div>
                @endif
                @endif


            </div>
        </div>



        <style>
        .bg-custom {
            background-color: teal;
        }
        </style>
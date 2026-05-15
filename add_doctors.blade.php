@extends('admin.maindesign')

@section('add_doctors')

<div class="container mt-5">

    <!-- SUCCESS MESSAGE -->
    @if(session('doctor_addmessage'))
        <div class="alert alert-success text-center shadow-sm">
            {{ session('doctor_addmessage') }}
        </div>
    @endif

    <div class="card shadow-lg border-0 rounded-4">

        <!-- HEADER -->
        <div class="card-header bg-dark text-white text-center rounded-top-4">
            <h4 class="mb-0">➕ Add New Doctor</h4>
        </div>

        <div class="card-body p-4">

            <form action="{{ route('post_add_doctor') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">

                    <!-- NAME -->
                    <div class="col-md-6">
                        <label class="form-label">Doctor Name</label>
                        <input type="text" name="doctors_name" class="form-control rounded-3 shadow-sm"
                               placeholder="Enter Doctor Name" required>
                    </div>

                    <!-- PHONE -->
                    <div class="col-md-6">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="doctors_phone" class="form-control rounded-3 shadow-sm"
                               placeholder="Enter Phone Number" required>
                    </div>

                    <!-- SPECIALITY -->
                    <div class="col-md-6">
                        <label class="form-label">Speciality</label>
                        <input type="text" name="speciality" class="form-control rounded-3 shadow-sm"
                               placeholder="Enter Speciality" required>
                    </div>

                    <!-- ROOM -->
                    <div class="col-md-6">
                        <label class="form-label">Room Number</label>
                        <input type="text" name="room_number" class="form-control rounded-3 shadow-sm"
                               placeholder="Enter Room Number" required>
                    </div>

                    <!-- IMAGE -->
                    <div class="col-12">
                        <label class="form-label">Upload Doctor Image</label>
                        <input type="file" name="doctors_image"
                               class="form-control rounded-3 shadow-sm" required>
                    </div>

                </div>

                <!-- BUTTON -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill shadow">
                        ➕ Add Doctor
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection
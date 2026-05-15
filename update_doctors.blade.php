@extends('admin.maindesign')
<base href="/public">

@section('view_doctors')

<div class="container mt-5">

    <!-- SUCCESS MESSAGE -->
    @if(session('doctor_updatemessage'))
        <div class="alert alert-success text-center shadow-sm">
            {{ session('doctor_updatemessage') }}
        </div>
    @endif

    <div class="card shadow-lg border-0 rounded-4">

        <!-- HEADER -->
        <div class="card-header bg-dark text-white text-center">
            <h4 class="mb-0">✏️ Update Doctor</h4>
        </div>

        <div class="card-body p-4">

            <form action="{{ route('post_update_doctor',$doctor->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">

                    <!-- NAME -->
                    <div class="col-md-6">
                        <label class="form-label">Doctor Name</label>
                        <input type="text" name="doctors_name"
                               class="form-control"
                               value="{{ $doctor->doctors_name }}" required>
                    </div>

                    <!-- PHONE -->
                    <div class="col-md-6">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="doctors_phone"
                               class="form-control"
                               value="{{ $doctor->doctors_phone }}" required>
                    </div>

                    <!-- SPECIALITY -->
                    <div class="col-md-6">
                        <label class="form-label">Speciality</label>
                        <input type="text" name="speciality"
                               class="form-control"
                               value="{{ $doctor->speciality }}" required>
                    </div>

                    <!-- ROOM -->
                    <div class="col-md-6">
                        <label class="form-label">Room Number</label>
                        <input type="text" name="room_number"
                               class="form-control"
                               value="{{ $doctor->room_number }}" required>
                    </div>

                    <!-- OLD IMAGE -->
                    <div class="col-12 text-center">
                        <label class="form-label d-block">Old Doctor Image</label>
                        <img src="{{ asset('project_img/'.$doctor->doctors_image) }}"
                             width="120"
                             class="rounded shadow">
                    </div>

                    <!-- NEW IMAGE -->
                    <div class="col-12">
                        <label class="form-label">Upload New Image (optional)</label>
                        <input type="file" name="doctors_image"
                               class="form-control">
                    </div>

                </div>

                <!-- BUTTON -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill shadow">
                        ✅ Update Doctor
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection
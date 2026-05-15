@extends('admin.maindesign')

@section('view_doctors')

<div class="container-fluid mt-4">

    <div class="row justify-content-center">
        <div class="col-12 col-lg-11 col-xl-10">

            <!-- CARD -->
            <div class="card shadow-sm border-0">

                <!-- HEADER -->
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold text-dark">
                        👨‍⚕️ Doctors List
                    </h5>

                    <span class="badge bg-danger fs-6">
                        {{ count($doctors) }}
                    </span>
                </div>

                <!-- BODY -->
                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle text-center">

                            <!-- HEAD -->
                            <thead class="table-light">
                                <tr class="text-secondary">
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Speciality</th>
                                    <th>Room</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <!-- BODY -->
                            <tbody>

                                @forelse ($doctors as $doctor)

                                <tr>

                                    <!-- NAME -->
                                    <td class="fw-semibold text-primary">
                                        {{ $doctor->doctors_name }}
                                    </td>

                                    <!-- PHONE -->
                                    <td>
                                        <span class="badge bg-light text-dark border">
                                            {{ $doctor->doctors_phone }}
                                        </span>
                                    </td>

                                    <!-- SPECIALITY -->
                                    <td>
                                        <span class="badge bg-info text-dark px-3 py-2">
                                            {{ $doctor->speciality }}
                                        </span>
                                    </td>

                                    <!-- ROOM -->
                                    <td>
                                        <span class="badge bg-success px-3 py-2">
                                            Room {{ $doctor->room_number }}
                                        </span>
                                    </td>

                                    <!-- IMAGE -->
                                    <td>
                                        <img src="{{ asset('project_img/'.$doctor->doctors_image) }}"
                                             class="rounded-circle shadow-sm"
                                             width="55" height="55"
                                             style="object-fit:cover;">
                                    </td>

                                    <!-- ACTION -->
                                    <td>
                                        <a href="{{ route('delete_doctor',$doctor->id) }}"
                                           class="btn btn-sm btn-danger rounded-pill px-3"
                                           onclick="return confirm('Delete doctor?')">
                                            Delete
                                        </a>
                                         <a href="{{ route('update_doctor',$doctor->id) }}"
                                           class="btn btn-sm btn-primary rounded-pill px-3"
                                        >
                                            Update
                                        </a>
                                    </td>

                                </tr>

                                @empty
                                <tr>
                                    <td colspan="6" class="text-muted py-4">
                                        😕 No Doctors Found
                                    </td>
                                </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection
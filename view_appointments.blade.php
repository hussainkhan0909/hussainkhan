@extends('admin.maindesign')

@section('view_appointments')

<div class="container-fluid mt-4">

    <div class="row justify-content-center">
        <div class="col-12 col-lg-11 col-xl-10">

            <div class="card shadow-sm border-0">

                <!-- HEADER -->
                <div class="card-header bg-white">
                    <h5 class="mb-0 fw-bold text-dark">
                        📅 Appointments List
                    </h5>
                </div>

                <!-- BODY -->
                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle text-center">

                            <!-- HEAD -->
                            <thead class="table-light">
                                <tr class="text-secondary">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Speciality</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <!-- BODY -->
                            <tbody>

                                @forelse ($appointment as $appointment)

                                <tr>

                                    <td class="fw-semibold text-primary">
                                        {{ $appointment->full_name }}
                                    </td>

                                    <td>
                                        <span class="badge bg-light text-dark border">
                                            {{ $appointment->email_address }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge bg-info text-dark">
                                            {{ $appointment->submission_date }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge bg-primary">
                                            {{ $appointment->speciality }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge bg-secondary">
                                            {{ $appointment->number }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $appointment->message }}
                                    </td>

                                    <td>
                                        <span class="badge bg-success">
                                            {{ $appointment->status ?? 'Pending' }}
                                        </span>
                                    </td>
                                    <td>
                                        <form action="{{ route('changestatus',$appointment->id) }}" method="post">
                                            @csrf
                                            <select name="status" id="status">
                                                <option value="accept">accept</option>
                                                <option value="in progress">in progress</option>
                                            </select>
                                            <input class="btn btn-sm btn-primary px-2" type="submit" name="submit" value="change status">
                                        </form>
                                    </td>

                                </tr>

                                @empty
                                <tr>
                                    <td colspan="7" class="text-muted py-4">
                                        😕 No Appointments Found
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
@extends('user.includes.app')

@section('content')
    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp mb-3 h1">My Appointments</h1>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Doctor Name</th>
                        <th>Date</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $item)
                        <tr>
                            <td>{{ $item->doctor->name }}</td>
                            <td>{{ $item->get_date }}</td>
                            <td>{{ $item->message }}</td>
                            <td>{{ $item->get_status }}</td>
                            <td>
                                <a href="{{ route('user.appointments.cancel', $item->id) }}" onclick="return confirm('Are you sure you want to cancel the appointment?')" type="button"
                                    class="btn btn-danger btn-sm">
                                    Cancel Appointment
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $appointments->links() !!}
        </div>
    </div>
@endsection

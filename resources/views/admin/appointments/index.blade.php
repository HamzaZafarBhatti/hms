@extends('admin.includes.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Appointments</h4>
            </p>
            <div class="table-responsive mb-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Patient Name</th>
                            <th>Patient Email</th>
                            <th>Patient Phone</th>
                            <th>Doctor Name</th>
                            <th>Date</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($appointments as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->name ?? 'Guest' }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->doctor->name }}</td>
                                <td>{{ $item->get_date }}</td>
                                <td>{{ $item->message }}</td>
                                <td>{{ $item->get_status }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.appointments.accept', $item->id) }}" class="text-info"
                                            title="Approve">
                                            <i class="mdi mdi-thumb-up"></i>
                                        </a>
                                        <a href="{{ route('admin.appointments.reject', $item->id) }}" class="text-warning"
                                            title="Disapprove">
                                            <i class="mdi mdi-thumb-down"></i>
                                        </a>
                                        <a href="{{ route('admin.appointments.send_email_view', $item->id) }}"
                                            class="text-info" title="Send Email">
                                            <i class="mdi mdi-email-outline"></i>
                                        </a>
                                        <a href="{{ route('admin.appointments.destroy', $item->id) }}"
                                            onclick="event.preventDefault();document.getElementById('deleteForm{{ $item->id }}').submit()"
                                            class="text-danger">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                        <form action="{{ route('admin.appointments.destroy', $item->id) }}"
                                            id="deleteForm{{ $item->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">No record found!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {!! $appointments->links() !!}
        </div>
    </div>
@endsection

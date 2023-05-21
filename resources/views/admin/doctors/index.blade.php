@extends('admin.includes.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Doctors</h4>
            </p>
            <div class="table-responsive mb-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Speciality</th>
                            <th>Room No.</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($doctors as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset('upload/doctor/' . $item->image) }}" alt="$item->name"
                                        style="object-fit: cover;"></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td class="text-uppercase">{{ $item->speciality }}</td>
                                <td>{{ $item->room_no }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('doctors.edit', $item->id) }}" class="text-info">
                                            <i class="mdi mdi-pen"></i>
                                        </a>
                                        <a href="{{ route('doctors.destroy', $item->id) }}"
                                            onclick="event.preventDefault();document.getElementById('deleteForm{{ $item->id }}').submit()"
                                            class="text-danger">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                        <form action="{{ route('doctors.destroy', $item->id) }}"
                                            id="deleteForm{{ $item->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">No record found!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {!! $doctors->links() !!}
        </div>
    </div>
@endsection

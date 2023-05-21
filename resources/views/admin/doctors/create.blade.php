@extends('admin.includes.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Doctor</h4>
            <form class="forms-sample" action="{{ route('doctors.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" style="color: #fff;" id="name" name="name"
                        value="{{ old('name') }}" placeholder="Name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" style="color: #fff;" id="email" name="email"
                        value="{{ old('email') }}" placeholder="Email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" style="color: #fff;" id="phone" name="phone"
                        value="{{ old('phone') }}" placeholder="Phone">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="speciality">Speciality</label>
                    <select name="speciality" id="speciality" class="form-control" style="color: #fff;">
                        <option value="">Select Option</option>
                        <option value="skin" @if (old('speciality') === 'skin') selected @endif>Skin</option>
                        <option value="heart" @if (old('speciality') === 'heart') selected @endif>Heart</option>
                        <option value="eye" @if (old('speciality') === 'eye') selected @endif>Eye</option>
                        <option value="nose" @if (old('speciality') === 'nose') selected @endif>Nose</option>
                    </select>
                    @error('speciality')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="room_no">Room No.</label>
                    <input type="text" class="form-control" style="color: #fff;" id="room_no" name="room_no"
                        value="{{ old('room_no') }}" placeholder="Phone">
                    @error('room_no')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="room_no">Image</label>
                    <input type="file" name="image" id="image" class="form-control" style="color: #fff;">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-dark">Cancel</button>
            </form>
        </div>
    </div>
@endsection

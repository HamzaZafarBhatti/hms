@extends('admin.includes.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Send Email</h4>
            <form class="forms-sample" action="{{ route('admin.appointments.send_email', $appointment->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="greetings">Greetings</label>
                    <input type="text" class="form-control" style="color: #fff;" id="greetings" name="greetings"
                        value="{{ old('greetings') }}" placeholder="Greetings">
                    @error('greetings')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" id="body" cols="30" rows="5" class="form-control">{{ old('body') }}</textarea>
                    @error('body')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="action_text">Action Text</label>
                    <input type="text" class="form-control" style="color: #fff;" id="action_text" name="action_text"
                        value="{{ old('action_text') }}" placeholder="Action Text">
                    @error('action_text')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="action_url">Action URL</label>
                    <input type="text" class="form-control" style="color: #fff;" id="action_url" name="action_url"
                        value="{{ old('action_url') }}" placeholder="Action URL">
                    @error('action_url')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="end_part">End Part</label>
                    <input type="text" class="form-control" style="color: #fff;" id="end_part" name="end_part"
                        value="{{ old('end_part') }}" placeholder="End Part">
                    @error('end_part')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-dark">Cancel</button>
            </form>
        </div>
    </div>
@endsection

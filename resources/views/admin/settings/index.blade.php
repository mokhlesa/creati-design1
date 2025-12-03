@extends('layouts.admin')

@section('content')
    <h1>Settings</h1>
    <form action="{{ route('admin.settings.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="contact_address">Contact Address</label>
            <textarea name="contact_address" id="contact_address" class="form-control">{{ $settings['contact_address']->value ?? '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="contact_email">Contact Email</label>
            <input type="email" name="contact_email" id="contact_email" class="form-control" value="{{ $settings['contact_email']->value ?? '' }}">
        </div>
        <div class="form-group">
            <label for="contact_phone">Contact Phone</label>
            <input type="text" name="contact_phone" id="contact_phone" class="form-control" value="{{ $settings['contact_phone']->value ?? '' }}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection

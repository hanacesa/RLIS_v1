@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card-header">
    <h2>Add New Volunteer</h2>
    </div>

    <form method="POST" action="{{ route('volunteer.store') }}">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" name="name" placeholder="name" required>
            <label for="name">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="email" name="email" placeholder="email">
            <label for="email">Email</label>
        </div>

        <div class="form-floating mb-3">
        <label for="dob">Date of Birth</label>
        <br><br>
  <input type="date" id="dob" name="dob">
        </div>
        
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Add</button>
        </div>
    </form>

</div>
@endsection
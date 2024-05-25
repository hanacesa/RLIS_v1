@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card-header">
    <h2>Edit Volunteer</h2>
    </div>
    @if(session('success'))
<div class="alert alert-success">
    {{ session('success')}}
</div>
@endif
<form method="post" action="{{ route('volunteer.update',$volunteer->id) }}">
    @csrf
    @method ('PUT')
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ $volunteer->name }}">
            <label for="name">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="email" name="email" placeholder="email" 
            value="{{ $volunteer->email }}">
            <label for="email">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="dob" name="dob" placeholder="dob" value="{{ $volunteer->dob }}">
            <label for="dob">Date of Birth</label>
        </div>
        
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </form>

</div>
@endsection
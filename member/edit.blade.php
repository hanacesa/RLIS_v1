@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card-header">
    <h2>Edit Member</h2>
    </div>
    @if(session('success'))
<div class="alert alert-success">
    {{ session('success')}}
</div>
@endif
<form method="post" action="{{ route('member.update',$member->id) }}">
    @csrf
    @method ('PUT')
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ $member->name }}">
            <label for="name">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="ic" name="ic" placeholder="ic" 
            value="{{ $member->ic }}">
            <label for="ic">IC</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="address" name="address" placeholder="address" value="{{ $member->address }}">
            <label for="address">Address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{ $member->email }}">
            <label for="email">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="mobileno" name="mobileno" placeholder="mobileno" value="{{ $member->mobileno }}">
            <label for="mobileno">Mobile Number</label>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </form>

</div>
@endsection
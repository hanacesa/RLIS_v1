@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="container-fluid">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        
        <a href="{{ route('volunteer.create') }}" class="btn btn-success me-md-2">Add new Library Volunteer</a>
        <a href="{{ route('volunteer.index')  }}" class="btn btn-success me-md-2">Volunteer Record</a>
        
        <a href="{{ route('book.create') }}" class="btn btn-success me-md-2">Add new Book</a>
        <a href="{{ route('book.index') }}" class="btn btn-success me-md-2">Book Record</a>

        <a href="{{ route('member.index') }}" class="btn btn-success me-md-2">Member Record</a>
        <a href="{{ route('borrow.index') }}" class="btn btn-success me-md-2">Borrow Record</a>
    </div>

    <div class="container-fluid">
    <div class="row justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="col-md-6 text-center">
    <h2 class="text-center">Confirm Borrow</h2>
    <p class="text-center">Member: {{ $member->name }}</p>
    <p class="text-center">Book: {{ $book->title }}</p>
    <form action="{{ route('borrow.store') }}" method="POST">
        @csrf
        <input type="hidden" name="member_id" value="{{ $member_id }}">
        <input type="hidden" name="book_id" value="{{ $book_id }}">
        <button type="submit" class="btn btn-primary d-block mx-auto">Confirm Borrow</button>
    </form>      
                
<div class="text-center mt-4">
    <a href="{{ route('borrow.index') }}" class="btn btn-success">Back</a>
    </div>
        </div>
    </div>
</div>
@endsection

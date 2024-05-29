@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="container-fluid">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        @can('isAdmin')
        <a href="{{ route('volunteer.create') }}" class="btn btn-success me-md-2">Add new Library Volunteer</a>
        <a href="{{ route('volunteer.index')  }}" class="btn btn-success me-md-2">Volunteer Record</a>


        @endcan
        
        
    <a href="{{ route('book.index') }}" class="btn btn-success me-md-2">Book Record</a>
       

        
        <a href="{{ route('member.index') }}" class="btn btn-success me-md-2">Member Record</a>
        <a href="{{ route('borrow.index') }}" class="btn btn-primary">Borrow Record</a>
    </div>

<!-- Search Form -->
<form method="GET" action="{{ route('borrow.index') }}" class="my-3">
        <div class="row">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Search by Book ID or IC" value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>


    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Book ID</th>
                <th>Book Borrowed</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1 @endphp
            @foreach($borrows as $borrow )
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $borrow->member->name ?? 'The member has been deleted' }}</td>
                <td>{{ $borrow->book_id }}</td>
                <td>{{ $borrow->book->title ?? 'The book has been deleted' }}</td>
                <td>{{ $borrow->borrowdate }}</td>
                <td>{{ $borrow->returndate }}</td>
                
                <td>
                    <div class="btn-group" role="group">
                        
                        
                        <a href="{{ route('borrow.edit', $borrow->id) }}" class="btn btn-info">Edit</a>
                        <form method="post" action="{{ route('borrow.destroy', $borrow->id) }}" onsubmit="return confirm('Are you sure you want to delete this record??')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

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
        @endcan
        <a href="{{ route('book.create') }}" class="btn btn-success me-md-2">Add new Book</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th>Actions</th>
                
            </tr>
        </thead>
        <tbody>
            @php $i = 1 @endphp
            @foreach($volunteers as $volunteer)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $volunteer->name }}</td>
                <td>{{ $volunteer->email }}</td>
                <td>{{ $volunteer->dob }}</td>
                
                
                <td>
                    <div class="btn-group" role="group">
                        
                        
                        <a href="{{ route('volunteer.edit', $volunteer->id) }}" class="btn btn-info">Edit</a>
                        @can('isAdmin') 
                        <form method="post" action="{{ route('volunteer.destroy', $volunteer->id) }}" onsubmit="return confirm('Are you sure you want to delete this Volunteer?')">
                           
                        @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @endcan
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-grid gap-2">
                        <a href="{{ route('volunteer.index') }}" class="btn btn-success me-md-2">Back</a>
        </div>
{!! $books->links() !!}
@endsection

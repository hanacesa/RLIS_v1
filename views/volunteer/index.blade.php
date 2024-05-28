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
        <a href="{{ route('volunteer.index')  }}" class="btn btn-primary">Volunteer Record</a>
@endcan

        
        <a href="{{ route('book.index') }}" class="btn btn-success me-md-2">Book Record</a>
        <a href="{{ route('member.index') }}" class="btn btn-success me-md-2">Member Record</a>
        <a href="{{ route('borrow.index') }}" class="btn btn-success me-md-2">Borrow Record</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date of Birth</th>
                
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
                        <form method="post" action="{{ route('volunteer.destroy', $volunteer->id) }}" onsubmit="return confirm('Are you sure you want to delete this Volunteer?')">
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
{!! $volunteers->links() !!}
@endsection

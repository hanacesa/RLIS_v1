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
        
        <a href="{{ route('member.index') }}" class="btn btn-primary">Member Record</a>
        <a href="{{ route('member.create') }}" class="btn btn-success me-md-2">Add new Member</a>
        <a href="{{ route('borrow.index') }}" class="btn btn-success me-md-2">Borrow Record</a>
    </div>

    <!-- Search Form -->
<form method="GET" action="{{ route('member.index') }}" class="my-3">
        <div class="row">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Search by Member Name or IC" value="{{ request('search') }}">
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
                <th>IC</th>
                <th>Address</th>
                <th>Email</th>
                <th>Mobile Number</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1 @endphp
            @foreach($members as $member)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->ic }}</td>
                <td>{{ $member->address }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->mobileno }}</td>
                
                <td>
                    <div class="btn-group" role="group">
                        
                        
                    <button onclick="window.location='{{ route('book.index', ['member_id' => $member->id]) }}'">Borrow</button>


                        <a href="{{ route('member.edit', $member->id) }}" class="btn btn-info">Edit</a>
                        <form method="post" action="{{ route('member.destroy', $member->id) }}" onsubmit="return confirm('Are you sure you want to delete this Member?')">
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
{!! $members->links() !!}
@endsection

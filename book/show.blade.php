@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success')}}
</div>
@endif
<div class="container-fluid">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        @can('isAdmin')
        <a href="{{ route('volunteer.create') }}" class="btn btn-success me-md-2">Add new Volunteer</a>
        @endcan
        <a href="{{ route('book.create') }}" class="btn btn-success me-md-2">Add new Book</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher Name</th>
                <th>Published Year</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publishername }}</td>
                <td>{{ $book->publishedyear }}</td>
                <td>{{ $book->category }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <!-- Borrow Form -->
                        <form method="post" action="{{ route('book.borrow', $book->id) }}">
                            @csrf
                            <input type="hidden" name="member_id" value="{{ auth()->user()->id }}">
                            <input type="date" name="borrowdate" required>
                            <input type="date" name="returndate" required>
                            <button type="submit" class="btn btn-primary">Borrow</button>
                        </form>
                        <a href="{{ route('book.edit', $book->id) }}" class="btn btn-info">Edit</a>
                        @can('isAdmin')
                        <form method="post" action="{{ route('book.destroy', $book->id) }}">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @endcan
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="d-grid gap-2">
    <a href="{{ route('book.index') }}" class="btn btn-success me-md-2">Back</a>
</div>
@endsection

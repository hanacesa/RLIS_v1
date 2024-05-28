<!-- resources/views/book/index.blade.php -->
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
        <a href="{{ route('volunteer.index') }}" class="btn btn-success me-md-2">Volunteer Record</a>
        @endcan
        <a href="{{ route('book.index') }}" class="btn btn-primary">Book Record</a>
        <a href="{{ route('book.create') }}" class="btn btn-success me-md-2">Add new Book</a>
        <a href="{{ route('member.index') }}" class="btn btn-success me-md-2">Member Record</a>
        <a href="{{ route('borrow.index') }}" class="btn btn-success me-md-2">Borrow Record</a>
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
            @php $i = 1 @endphp
            @foreach($books as $book)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publishername }}</td>
                <td>{{ $book->publishedyear }}</td>
                <td>{{ $book->category }}</td>
                <td>
                    <div class="btn-group" role="group">
                        @if($member_id)
                            <a href="{{ route('borrow.create', ['member_id' => $member_id, 'book_id' => $book->id]) }}" class="btn btn-success">Borrow</a>
                        @else
                            <button onclick="alert('Select a member to borrow a book')" class="btn btn-secondary">Borrow</button>
                        @endif
                        <a href="{{ route('book.edit', $book->id) }}" class="btn btn-info">Edit</a>
                        <form method="post" action="{{ route('book.destroy', $book->id) }}" onsubmit="return confirm('Are you sure you want to delete this book?')">
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
<div class="d-grid gap-2">
    <a href="{{ route('volunteer.index') }}" class="btn btn-success me-md-2">Back</a>
</div>
@endsection

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card-header">
    <h2>Edit Book</h2>
    </div>
    @if(session('success'))
<div class="alert alert-success">
    {{ session('success')}}
</div>
@endif
<form method="post" action="{{ route('book.update',$book->id) }}">
    @csrf
    @method ('PUT')
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="title" name="title" placeholder="title" value="{{ $book->title }}">
            <label for="title">Title</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="author" name="author" placeholder="author" 
            value="{{ $book->author }}">
            <label for="author">Author</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="publishername" name="publishername" placeholder="publishername" value="{{ $book->publishername }}">
            <label for="publishername">Publisher Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="publishedyear" name="publishedyear" placeholder="publishedyear" value="{{ $book->publishedyear }}">
            <label for="publishedyear">Published Year</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="category" name="category" placeholder="category" value="{{ $book->category }}">
            <label for="category">Category</label>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Add</button>
        </div>
    </form>

</div>
@endsection
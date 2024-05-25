@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card-header">
    <h2>Add New Book</h2>
    </div>

    <form method="POST" action="{{ route('book.store') }}">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="title" name="title" placeholder="title" required>
            <label for="title">Title</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="author" name="author" placeholder="author">
            <label for="author">Author</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="publishername" name="publishername" placeholder="publishername">
            <label for="publishername">Publisher Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="publishedyear" name="publishedyear" placeholder="publishedyear">
            <label for="publishedyear">Published Year</label>
        </div>
        <div class="form-floating mb-3">
        <label for="category">Category:</label>
        <br><br>
  <select name="category" id="category">
    <option value="novel">Novel</option>
    <option value="religion">Religion</option>
    <option value="academic">Academic</option>
    <option value="children">Children</option>
    <option value="generalreadings">General Readings</option>
  </select>
  <br><br>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Add</button>
        </div>
    </form>

</div>
@endsection
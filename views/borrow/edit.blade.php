@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card-header">
    <h2>Edit Borrow Record</h2>
    </div>
    @if(session('success'))
<div class="alert alert-success">
    {{ session('success')}}
</div>
@endif
<form method="post" action="{{ route('borrow.update',$borrow->id) }}">
    @csrf
    @method ('PUT')
        <div class="form-floating mb-3">
            <input type="hidden" class="form-control" id="member_id" name="member_id" value="{{ $borrow->member_id }}">
            <label for="title">Member ID</label>
        </div>
        <div class="form-floating mb-3">
            <input type="hidden" class="form-control" id="book_id" name="book_id" 
            value="{{ $borrow->book_id }}">
            <label for="book_id">Book ID</label>
        </div>
        <div class="form-floating mb-3">
            <input type="hidden" class="form-control" id="borrowdate" name="borrowdate" value="{{ $borrow->borrowdate }}">
            <label for="borrowdate">Borrow Date</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="returndate" name="returndate" placeholder="returndate" value="{{ old('returndate', $borrow->returndate ?? '') }}">
            <label for="returndate">Return Date</label>
        </div>
        
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </form>

</div>
@endsection
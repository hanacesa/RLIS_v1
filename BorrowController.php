<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
    $books = Book::all();
    $borrows = Borrow::paginate(10); // Using pagination as per your example

    // Pass the $borrows and $books variables to the view
    return view('borrow.index', compact('borrows', 'books', 'members'));

    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($member_id, $book_id)
    {
        // Return a view to confirm the borrowing process or handle directly
        return view('borrow.create', compact('member_id', 'book_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
        ]);

        // Create a new borrow record
        $borrow = new Borrow;
        $borrow->member_id = $request->member_id;
        $borrow->book_id = $request->book_id;
        $borrow->borrowdate = now(); // Add other necessary fields
        $borrow->returndate = null;
        $borrow->save();

        return redirect()->route('borrow.index')->with('success', 'Book borrowed successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrow $borrow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrow $borrow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrow $borrow)
    {
        //
    }
}

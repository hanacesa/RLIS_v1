<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Assuming you get member_id from the request
    
    
    // Fetch all books
    $books = Book::all();
    $member_id = $request->query('member_id', null);
    // Pass member_id and books to the view
    return view('book.index', compact('books', 'member_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create a new Student instance and assign values
$newBook = new Book;

$newBook->title = $request->title;
$newBook->author = $request->author;
$newBook->publishername = $request->publishername;
$newBook->publishedyear = $request->publishedyear;
$newBook->category = $request->category;
$newBook->save();

// If saving was successful, redirect to student index page with success message
return redirect()->route('book.index')->with('success', 'New book record added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch the book by its ID
        $book = Book::findOrFail($id);

        // Pass the book to the view
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        // Update the name field separately
    $book->title = $request->input('title');
    $book->author = $request->input('author');
    $book->publishername = $request->input('publishername');
    $book->publishedyear = $request->input('publishedyear');
    $book->category = $request->input('category');
    $book->update();

    // Redirect back with success message
    //return redirect()->back()->withSuccess('Book record updated successfully.');

    return redirect()->route('book.index')->with('success', 'Book record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index')
            ->withSuccess('Book record deleted successfully.');
    }

    

    public function borrow(Request $request)
{
    $request->validate([
        'member_id' => 'required|exists:members,id',
        'book_id' => 'required|exists:books,id',
    ]);

    // Insert a new record into the borrow table
    Borrow::create([
        'member_id' => $request->member_id,
        'book_id' => $request->book_id,
        'borrow_date' => now(), // Assuming borrow_date is a timestamp
        'return_date' => null, // Set return_date to null initially
    ]);

    return redirect()->route('borrow.index')->with('success', 'Book borrowed successfully!');
}
}

<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Book;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::all();
        
        $query = Member::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('ic', 'LIKE', "%{$search}%");
        }

        $members = $query->paginate(10);

        return view('member.index', compact('members', 'books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create a new Member instance and assign values
$newMember = new Member;

$newMember->name = $request->name;
$newMember->ic = $request->ic;
$newMember->address = $request->address;
$newMember->email = $request->email;
$newMember->mobileno = $request->mobileno;
$newMember->save();

// If saving was successful, redirect to student index page with success message
return redirect()->route('member.index')->with('success', 'New member record added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        // Update the name field separately
    $member->name = $request->input('name');
    $member->ic = $request->input('ic');
    $member->address = $request->input('address');
    $member->email = $request->input('email');
    $member->mobileno = $request->input('mobileno');
    $member->update();

    // Redirect back with success message
    //return redirect()->back()->withSuccess('Book record updated successfully.');

    return redirect()->route('member.index')->with('success', 'Member record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('member.index')
            ->withSuccess('Member record deleted successfully.');
    }
}

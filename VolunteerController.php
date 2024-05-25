<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $volunteers = volunteer::paginate(10);
        // Pass the $volunteers variable to the view
        return view('volunteer.index', compact('volunteers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('volunteer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create a new Volunteer instance and assign values
$newVolunteer = new Volunteer;

$newVolunteer->name = $request->name;
$newVolunteer->email = $request->email;
$newVolunteer->dob = $request->dob;
$newVolunteer->save();

// If saving was successful, redirect to student index page with success message
return redirect()->route('volunteer.index')->with('success', 'New volunteer record added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Volunteer $volunteer)
    {
        
        return view('volunteer.show', compact('volunteer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Volunteer $volunteer)
    {
        return view('volunteer.edit', compact('volunteer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        // Update the name field separately
    $volunteer->name = $request->input('name');
    $volunteer->email = $request->input('email');
    $volunteer->dob = $request->input('dob');
    $volunteer->update();

    // Redirect back with success message
    //return redirect()->back()->withSuccess('Book record updated successfully.');

    return redirect()->route('volunteer.index')->with('success', 'Volunteer record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();
        return redirect()->route('volunteer.index')
            ->withSuccess('Volunteer record deleted successfully.');
    }
}

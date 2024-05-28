<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:volunteers|unique:users',
            'dob' => 'required|date',
            'password' => 'required|string|min:8|confirmed',
        ]);

        DB::transaction(function () use ($request) {
            $volunteer = Volunteer::create([
                'name' => $request->name,
                'email' => $request->email,
                'dob' => $request->dob,
                'password' => Hash::make($request->password), // Hash the password
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'volunteer',
                'volunteer_id' => $volunteer->id,
            ]);
        });

        return redirect()->route('volunteer.index')->with('success', 'Volunteer created successfully');
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:volunteers,email,' . $volunteer->id . '|unique:users,email,' . $volunteer->user->id,
            'dob' => 'required|date',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
    
        DB::transaction(function () use ($request, $volunteer) {
            // Update volunteer fields
            $volunteer->update($request->only(['name', 'email', 'dob']));
    
            // Check if the volunteer has a related user
            if ($volunteer->user) {
                $user = $volunteer->user;
    
                // Update user fields
                $userData = [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'volunteer_id' => $volunteer->id,
                ];
    
                // Update password if provided and not empty
                if ($request->filled('password')) {
                    $userData['password'] = Hash::make($request->input('password'));
                }
    
                // Update the user with the new data
                $user->update($userData);
            }
        });
    
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

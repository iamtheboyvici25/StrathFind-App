<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;

class ClaimController extends Controller
{
    // Display all claims
    public function index()
    {
        $claims = Claim::all();
        return view('claims.index', compact('claims'));
    }

    // Show form to create a new claim
    public function create()
    {
        return view('claims.create');
    }

    // Store a new claim in the database
    public function store(Request $request)
    {
        $request->validate([
            'claimant_name' => 'required|string|max:255',
            'item_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:pending,approved,rejected',
        ]);

        Claim::create($request->all());

        return redirect()->route('claims.index')
                         ->with('success', 'Claim added successfully.');
    }

    // Show a single claim
    public function show(Claim $claim)
    {
        return view('claims.show', compact('claim'));
    }

    // Show form to edit a claim
    public function edit(Claim $claim)
    {
        return view('claims.edit', compact('claim'));
    }

    // Update a claim
    public function update(Request $request, Claim $claim)
    {
        $request->validate([
            'claimant_name' => 'required|string|max:255',
            'item_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:pending,approved,rejected',
        ]);

        $claim->update($request->all());

        return redirect()->route('claims.index')
                         ->with('success', 'Claim updated successfully.');
    }

    // Delete a claim
    public function destroy(Claim $claim)
    {
        $claim->delete();
        return redirect()->route('claims.index')
                         ->with('success', 'Claim deleted successfully.');
    }
}

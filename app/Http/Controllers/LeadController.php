<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Lead::all();
        return Inertia::render('Leads/Index', ['leads' => $leads]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'value' => ['required', 'numeric'],
            'source' => ['nullable', 'string'],
            'type' => ['nullable', 'string'],
            'stage' => ['required', 'string'],
            'expected_close_date' => ['nullable', 'date'],
            'contact_person_name' => ['required', 'string'],
            'contact_person_email' => ['required', 'email'],
        ]);

        $contactPerson = \App\Models\User::firstOrCreate(
            ['email' => $request->contact_person_email],
            ['name' => $request->contact_person_name, 'password' => bcrypt('password')]
        );

        Lead::create([
            'title' => $request->title,
            'description' => $request->description,
            'value' => $request->value,
            'source' => $request->source,
            'type' => $request->type,
            'stage' => $request->stage,
            'expected_close_date' => $request->expected_close_date,
            'user_id' => auth()->id(),
            'contact_person_id' => $contactPerson->id,
        ]);

        return redirect()->route('leads.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        $lead->load('user', 'contactPerson');
        return Inertia::render('Leads/Show', ['lead' => $lead]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Update the stage of the specified resource in storage.
     */
    public function updateStage(Request $request, Lead $lead)
    {
        $request->validate([
            'stage' => ['required', 'string'],
        ]);

        $lead->update(['stage' => $request->stage]);

        return back();
    }
}

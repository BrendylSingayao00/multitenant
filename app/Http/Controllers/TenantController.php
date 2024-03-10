<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;


class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::with('domains')->get();
        
        return view('tenants.index', ['tenants'=>$tenants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenants.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:225',
            'email' => 'required|string|max:225',
            'domain_name' => 'required|string|max:225|unique:domains,domain',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'subscription_duration' => [
                'required',
                Rule::in([6, 12, 24, 60]), // Validate that the subscription duration is one of these options
            ],
        ]);
    
        $tenant = Tenant::create($validateData);
    
        $tenant->domains()->create([
            'domain' => $validateData['domain_name'] . '.' . config('app.domain'),
            'tenant_id' => (string) $tenant->id, // Cast tenant_id to string
        ]);
    
        // You can handle the subscription duration here as needed
    
        return redirect()->route('tenants.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tenant = Tenant::findOrFail($id);
        return view('tenants.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tenant = Tenant::findOrFail($id);
        return view('tenants.edit', compact('tenant'));
    }

    /**
     * Update the specified tenant in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tenant = Tenant::findOrFail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            // Add validation rules for other fields here
        ]);
    
        $tenant->update($validatedData);
    
        return redirect()->route('tenants.index')->with('success', 'Tenant updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tenant = Tenant::findOrFail($id);
        $tenant->delete();

        return redirect()->route('tenants.index')->with('success', 'Tenant deleted successfully.');
    }
}
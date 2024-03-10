<?php

namespace App\Http\Controllers\App;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->get();
        
        return view('app.users.index', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.users.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:225',
            'email' => 'required|string|max:225|unique:users,email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],


        ]);

         User::create($validateData);

       

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        
        return view('app.users.edit', ['user'=>$user,'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:225',
            'email' => 'required|string|max:225|unique:users,email,'.$user->id,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'roles'=> 'required|array'

        ]);
            
        $user->update($validateData);
         $user->roles()->sync($request->input('roles'));

       

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
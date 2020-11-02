<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique',
            'currency' => 'required',
            'rate_per_hr' => 'required|numeric'
        ];
        // Define any custom messages
        $customMessages = [
            'rate_per_hr.required' => 'You must provide a rate per hour',
        ];
        $this->validate($request, $rules, $customMessages);
        // If incomming request data validates ok, create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'currency' => $request->currency,
            'rate_per_hr' => (float) $request->rate_per_hr,
            'password' => bcrypt('atopsecretpassword:)'),
        ]);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users/show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required',
            'currency' => 'required',
            'rate_per_hr' => 'required'
        ];
        // If the email has changed, make sure its unique
        if($request->email !== $user->email) {
            $rules['email'] = 'required|email|unique:users';
        } else {
            $rules['email'] = 'required|email';
        }
        // Define any custom messages
        $customMessages = [
            'rate_per_hr.required' => 'You must provide a rate per hour',
        ];
        $this->validate($request, $rules, $customMessages);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->currency = $request->currency;
        $user->rate_per_hr = (float) $request->rate_per_hr;
        $user->update();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}

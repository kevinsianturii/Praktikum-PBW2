<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\view;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return\Illuminate\Http\Request
     */
    public function index()
    {
        $users = User::all();
        return view('user.daftarPengguna',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return\Illuminate\Http\Request
     */
    public function create()
    {
        return view('user.registrasi');
    }
    

    /**
     * Store a newly created resource in storage.
     *@return\Illuminate\Http\Request
     *@return\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:100'],
            'fullname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'], 
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string', 'max:1000'],
            'birtdate' => ['required', 'date'],
            'phoneNumber' => ['required', 'string', 'max:20'],
            'agama' => ['required', 'string', 'max:20'],
            'jenis_kelamin' => ['required', 'numeric' ,'in:0,1'],
        ]);
        // 6706220055_Kevin Sianturi_4604
        $user = User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'birtdate' => $request->birtdate,
            'phoneNumber' => $request->phonenumber,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,

        ]);
        
        return redirect('/user');
    }
 
    /**
     * Display the specified resource.
     * @return\Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.infoPengguna', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return\Illuminate\Http\Request
     */
    public function edit(string $id)
    {
        //
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
}

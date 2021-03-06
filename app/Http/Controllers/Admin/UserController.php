<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('adminpannel');
    }
    public function index()
    {
       $users = User::all();
       return view('admin.users.index',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {

         User::create([
            'name'     => $request->input('name'),
            'family'   => $request->input('family'),
            'phone'    => $request->input('phone'),
            'role'     =>  'admin',
            'email'    => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect('admin/users');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request,User $user)
    {

        $user->update([
            'name'     => $request->input('name'),
            'family'   => $request->input('family'),
            'phone'    => $request->input('phone'),
            'role'     => 'admin',
            'email'    => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user != null) {
            $user->delete();
            return redirect()->back();
        }
    }
}

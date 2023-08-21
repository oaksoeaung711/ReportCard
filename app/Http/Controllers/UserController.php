<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('permissions')->paginate(10);
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        if(Auth::user()->id != $user->id && empty($user->permissions->find(1))){
            $permissions = Permission::all();
            return view('users.edit',compact('permissions','user'));
        }else{
            return redirect()->route('users.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $permissions = Permission::all();
        foreach($permissions as $permission){
            if($request->has($permission->id) && empty($user->permissions->find($permission->id))){
                $user->permissions()->attach($permission->id);
            }elseif(!$request->has($permission->id)){
                $user->permissions()->detach($permission->id);
            }
        }
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //  public static function middleware(): array
    // {
    //     return [

    //         new Middleware('permission:view user', only: ['index']),
    //         new Middleware('permission:create user', only: ['create']),
    //         new Middleware('permission:edit user', only: ['edit']),
    //         new Middleware('permission:delete user', only: ['destroy']),

    //     ];
    // }
    public function index()
    {
        $users=User::orderBy('name','asc')->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles=Role::orderBy('name','asc')->get();
        return view('user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|min:5',
            'email'=>'required|email|unique:users|min:6',
            'password'=>'required|min:6'
        ]);

        if($validator->passes())
            {
                $user=new User();
                $user->name=$request->name;
                $user->email=$request->email;
                $user->password=Hash::make($request->password);
                $user->save();

                foreach($request->role as $role)
                    {

                        $user->assignRole($role);
                    }

                    return redirect()->route('users.index')->with('success',"Users created succesfully");
            }

            return redirect()->route('users.create')->withErrors($validator)->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::findOrFail($id);
        $roles=Role::orderBy('name','asc')->get();

        $hasRole=$user->roles->pluck('id');

// dd($hasRole);
        return view('user.edit', compact('user', 'roles', 'hasRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user=User::findOrFail($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();

        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully');
    }
}

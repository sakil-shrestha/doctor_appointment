<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    // public static function middleware(): array
    // {
    //     return [

    //         new Middleware('permission:view role', only: ['index']),
    //         new Middleware('permission:create role', only: ['create']),
    //         new Middleware('permission:edit role', only: ['edit']),
    //         new Middleware('permission:delete role', only: ['destroy']),

    //     ];
    // }
    public function index()
    {
        $roles=Role::orderBy('name','asc')->get();


        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions=Permission::orderBy('name','asc')->get();
        return view('roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validator=Validator::make($request->all(),[
            'name'=>'required|unique:roles'
        ]);

        if($validator->passes())
            {
                $role=Role::create([
                    'name'=>$request->name
                ]);

                if(!empty($request->permission))
                    {
                        foreach($request->permission as $permission)
                        {
                            $role->givePermissionTo($permission);
                        }
                    }
                return redirect()->route('roles.index')->with('success','Role created successfully');
            }
            else{
                return redirect()->route('roles.create')->withErrors($validator)->withInput();
            }
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
        $role=Role::findOrFail($id);
        $hasPermissions=$role->permissions->pluck('name');
        $permissions=Permission::orderBy('name','asc')->get();
        return view('roles.edit',compact('role','permissions','hasPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validator=Validator::make($request->all(),[
            'name'=>'required|unique:roles,name,'.$id
        ]);
        $role=Role::findOrFail($id);

        if($validator->passes())
            {
                $role->name=$request->name;
                $role->save();

                if(!empty($request->permission))
                    {
                        $role->syncPermissions($request->permission);
                    }
                    else{
                        $role->syncPermissions([]);
                    }
                return redirect()->route('roles.index')->with('success','Role updated successfully');
            }
            else{
                return redirect()->route('roles.edit', $id)->withErrors($validator)->withInput();
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role=Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success','Role deleted successfully');
    }
}

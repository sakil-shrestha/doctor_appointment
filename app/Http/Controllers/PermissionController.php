<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //  public static function middleware(): array
    // {
    //     return [

    //         new Middleware('permission:view permission', only: ['index']),
    //         new Middleware('permission:create permission', only: ['create']),
    //         new Middleware('permission:edit permission', only: ['edit']),
    //         new Middleware('permission:delete permission', only: ['destroy']),

    //     ];
    // }
    public function index()
    {
        $permissions=Permission::orderBy('id','desc')->get();
        // $permissions=Permission::orderBy('id','desc')->paginate(2);

        return view('permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|unique:permissions|min:3'
        ]);

        if($validator->passes())
            {
                Permission::create([
                    'name'=>$request->name
                ]);
                return redirect()->route('permissions.index')->with('success','Permission created successfully');
            }
            else{
                return redirect()->route('permissons.create')->withErrors($validator)->withInput();
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
        $permission=Permission::findOrFail($id);
        return view('permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|unique:permissions,name,'.$id.'|min:3'
        ]);

        if($validator->passes())
            {
                $permission=Permission::findOrFail($id);
                $permission->update([
                    'name'=>$request->name
                ]);
                return redirect()->route('permissions.index')->with('success','Permission updated successfully');
            }
            else{
                return redirect()->route('permissons.edit',$id)->withErrors($validator)->withInput();
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission=Permission::findOrFail($id);
        $permission->delete();
        return redirect()->route('permissions.index')->with('success','Permission deleted successfully');
    }
}

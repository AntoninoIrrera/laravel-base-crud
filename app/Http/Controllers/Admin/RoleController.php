<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public $validation = [
        "name" => 'required|string|max:100',
        "color" => 'required|string|max:8',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $trash = Role::onlyTrashed()->count();
        return view('admin.roles.index', compact('roles', 'trash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create', ["role" => new Role()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validation);

        $newRole = new Role();
        $newRole->fill($data);
        $newRole->save();

        return redirect()->route('admin.roles.show', $newRole->id)->with('message', "$newRole->name has been created")->with('alert-type', 'info');
    }

    /**
     * Display the specified resource.
     *
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $editData = $request->validate($this->validation);

        $role->update($editData);

        return redirect()->route('admin.roles.show', compact('role'))->with('message', "$role->name has been update")->with('alert-type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('message', "$role->name has been delete")->with('alert-type', 'warning');
    }


    public function trash()
    {
        $roles = Role::onlyTrashed()->get();
        return view('admin.roles.trashed', compact('roles'));
    }

    public function restore($id)
    {
        Role::where('id', $id)->withTrashed()->restore();
        return redirect()->route('admin.roles.index')->with('message', "Role has been restored")->with('alert-type', 'success');
    }

    public function restoreAll()
    {
        Role::withTrashed()->restore();
        return redirect()->route('admin.roles.index')->with('message', "Role has been restored")->with('alert-type', 'success');
    }

    public function forceDelete($id)
    {
        Role::where('id', $id)->withTrashed()->forceDelete();
        return redirect()->route('admin.roles.index')->with('message', 'Project has been permanently deleted')->with('type', 'warning');
    }
}

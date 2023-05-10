<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('crud.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud.add_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'email', 'password');
        User::upsert($data, ['email'], ['name', 'email', 'password']);
        $notification = array('message' => 'User insert successfull.', 'alert-type' => 'success');
        return redirect()->route('users.index')->with($notification);
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
        $user = User::findOrFail($id);
        return view('crud.edit_user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $data = [
            'name'      => $request->name, 
            'email'     => $request->email, 
            'password'  => $request->password
        ];

        $update = User::find($id);
        if(!empty($update)){
            $update->update($data);
            $notification = array('message' => 'User update successfull.', 'alert-type' => 'success');
            return redirect()->route('users.index')->with($notification);
        }        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = User::findOrFail($id);
        if(!empty($delete)){
            $delete->delete();
            $notification = array('message' => 'User delete successfull. If you don\'t restore within 30 days. Then it will be deleted forever.', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        
    }

    public function trashed(){
        $trashed = User::onlyTrashed()->paginate(5);
        return view('crud.trashed', compact('trashed'));
    }

    public function restore($id){
        $restore = User::withTrashed()->findOrFail($id);
        if(!empty($restore)){
            $restore->restore();
        }

        $notification = array('message' => 'User restore successfull.', 'alert-type' => 'success');
        return redirect()->route('users.index')->with($notification);
    }

    public function permanentlyDelete($id){
        $delete = User::withTrashed()->findOrFail($id);
        if(!empty($delete)){
            $delete->forceDelete();
        }

        $notification = array('message' => 'User permanently delete successfull.', 'alert-type' => 'success');
        return redirect()->route('users.index')->with($notification);
    }
}

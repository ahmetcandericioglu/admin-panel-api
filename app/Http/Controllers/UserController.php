<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usertitle' => 'required',
            'username' => 'required|unique:users|alpha:ascii',
            'password' => 'required|min:6'
         ]);

        User::create([
            'username' => $request->username,
            'usertitle' => $request->usertitle,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'usertitle' => 'required',
            'username' => 'required|alpha:ascii|unique:users,id,'.$id,
            'password' => 'required|min:6'
        ]);

        $user = User::find($id);
        $user->username = $request->username;
        $user->usertitle = $request->usertitle;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message' => 'User updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return response()->json(["message" => "User deleted successfully"]);
    }

    public function destroySelected($ids)
    {
        $ids = explode(",",$ids);
        User::whereIn("id",$ids)->delete();
        return response()->json(['message' => 'Selected users deleted successfully']);
    }
}

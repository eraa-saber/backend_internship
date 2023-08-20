<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return response()->json([
            'results' => $users
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(UserStoreRequest $request)
    {
        [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phonenumber' => $request->phonenumber
        ];
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $users = User::find($id);

        if (!$users) {
            return response()->json([
                'message' => "User Not Found"
            ], 404);
        }
        return response()->json([
            'results' => $users
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UserStoreRequest $request, string $id)
    {
        try {
            //find user
            $users = User::find($id);

            if (!$users) {
                return $users()->json([
                    'message' => "User Not Found"
                ], 404);
            }

            //update user
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = $request->password;
            $users->phonenumber = $request->phonenumber;

            $users->save();

            return response()->json([
                'message' => "Successfully updated."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "ERROR!!!"
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete user
        $users = User::find($id);

        if (!$users) {
            return response()->json([
                'message' => "User Not Found"
            ], 404);
        }

        $users->delete();

        return response()->json([
            'message' => "Successfully deleted."
        ], 200);
    }
}

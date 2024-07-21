<?php

// app/Http/Controllers/AdminController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        #if search is there fetch the related data
        if (!empty($request->search)) {
            $users = User::where('name', 'like', "%{$request->search}%")
                ->orWhere('email', 'like', "%{$request->search}%")
                ->get();
        } else {
            #otherwise fetch all data
            $users = User::all();
        }
        return view('dashboard', compact('users'));
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        # Redirect back to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'User deleted successfully.');
    }
}

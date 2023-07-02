<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);

        if ($user) {
            $user->role_as = $request->input('role_as');
            $user->update();
            return redirect('admin/users')->with('message', 'អ្នកប្រើប្រាស់ត្រូវបានកែប្រែដោយជោគជ័យ');
        } else {
            return redirect('admin/users')->with('message', 'រកមិនឃើញអ្នកប្រើប្រាស់');
        }
    }
}

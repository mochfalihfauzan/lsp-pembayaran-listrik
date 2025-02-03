<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Tarif;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function usersManagement()
    {
        $users = User::all();
        return view(
            'admin.user-management',
            [
                'users' => $users,
            ]
        );
    }

    public function pelanggan()
    {
        $pelanggan = Pelanggan::all();
        return view(
            'admin.pelanggan-management',
            [
                'users' => $pelanggan,
            ]
        );
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view(
            'admin.user-manage.edit',
            [
                'user' => $user,
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
        return redirect()->route('users-management')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->pelanggan) {
            $user->pelanggan->delete();
        }

        User::destroy($id);
        return redirect()->route('users-management')->with('success', 'User deleted successfully');
    }
}

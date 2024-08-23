<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    public function getAllUser()
    {
        return User::all();
    }

    public function createUser(Request $request): void
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
    }

    public function updateUser(Request $request, User $user): void
    {
        $arrays = $request->all();

        $user->update($arrays);
    }
}

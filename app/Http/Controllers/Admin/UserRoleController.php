<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function update($id)
    {
        $user = User::find($id);
        
        if ($user->role == 'user') {
            $user->update(['role' => 'admin']);
        } else {
            $user->update(['role' => 'user']);
        }

        return redirect(route('admin.home'));
    }
}

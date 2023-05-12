<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\c;
use App\Models\User;
use App\Http\Controllers\Controller;

class ValidUserController extends Controller
{
    public function all_users() {
        $users = User::all();
        return view("user", ["users"=>$users]);
    }

    public function delete_user($id) {
        User::destroy($id);
        return redirect('users')->with('status_delete', 'Data User Berhasil Dihapus!');
    }
}

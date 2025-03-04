<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // $data =
        //     [
        //         'username' => 'manager_tiga',
        //         'nama' => 'Manager 3',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ];

        // UserModel::create($data);

        $user = UserModel::findOr(20, ['username', 'nama'], function(){
            abort(404);
        });
        return view('user', ['data' => $user]);
    }
}

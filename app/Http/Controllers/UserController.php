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
        // $user = UserModel::all();

        // $user = UserModel::findOr(20, ['username', 'nama'], function(){
        //     abort(404);
        // });

        // $user = UserModel::findOrFail(1);

        // $user = UserModel::where('username', 'manager0')->firstOrFail()


        // $user = UserModel::where('level_id', 2)->count();
        // // dd($user);

        $user = UserModel::firstOrNew([
            'username' => 'manager11',
            'nama'  => 'Manager11',
            'password' => Hash::make('12345'),
            'level_id'  => 2
        ]);

        $user->username = 'manager12';

        $user->save();

        $user->wasChanged(); //true
        $user->wasChanged('username');//true
        $user->wasChanged(['username', 'level_id']);//true
        $user->wasChanged('nama');//false
        dd($user->wasChanged(['nama', 'username']));//false

        // return view('user', ['data' => $user]);
    }
}

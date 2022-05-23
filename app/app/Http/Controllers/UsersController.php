<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users =  User::orderBy('updated_at' , 'DESC')->paginate(5);
        return view('users.index', compact('users') );
    }
}

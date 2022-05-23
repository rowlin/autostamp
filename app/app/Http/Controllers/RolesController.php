<?php

namespace App\Http\Controllers;

use App\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{

    public function index(){
         $roles = Roles::paginate(5);;
         return view('roles.index' , compact('roles'));
    }

    public function create(){

    }

    public function edit(){


    }

    public function save(){


    }

    public function delete(){


    }
}

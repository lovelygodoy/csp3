<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Role;
use App\Post;
use Auth;
use Session;
use Hash;

class AdminController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){

    	return view('/admin.home');
    }

    public function show(){

         $users = User::orderBy('name', 'ASC')->paginate(10);

        return view('admin.dashboard',compact('users'));
    }

    public function delete($id){

        User::find($id)->delete();
        Session::flash('status', 'User Account deleted successfully!');

        return back();

    }

    public function update($id) {


        User::find($id)->update([
            'role_id' => request('role_id'),
            'user_id' => $id
        ]);


        Session::flash('status', 'Role updated successfully!');

        return back();
    }

    public function store() {

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'role_id' => "1"
        ]);


       Session::flash('status', 'New Account added successfully!');

        return back();
    }
    

}

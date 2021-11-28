<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
  
    
    public function index()
    {
        //query list of Users from db
        $users=User::paginate(1);
        //$users=User::all();


        //return to view resources/views/Users
        return view('users.index',compact('users'));
        //return 'hello world';
    }
    public function show(User $User)
    {
        return view('Users.show',compact('User'));
    }
    public function edit(User $User)
    {
        return view('Users.edit',compact('User'));
    }
    public function update(User $User,Request $request)
    {
        
            //store Users table usiong model
            $User->name = $request->name;
            $User->email = $request->email;
            $User->save();
            
            //return Users index
            return redirect()->to('/users');
            
    }
    public function delete(User $User)
    {
        //delete from table using model
        $User->delete();
        //return Users index
        return redirect()->to('/users');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function login(Request $req){
        
        $user = User::where(['email'=>$req->email])->first();

        if(!$user || !Hash::check($req->password, $user->password)){
            return "Username or Password is not Mathced";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
    
    function register(Request $req){
        
        // $validator = Validator::make($req->all(), [
        //     'name' => 'required',
        //     'email' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     //echo $validator->errors();
        //     //return redirect('register')
        //     //            ->withErrors($validator)
        //     //            ->withInput();
        // }

        // $req->->validateWithBag('adduser',[
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required'
        //     ]);
        
        
        //return $req->input();
        
        // $req->session()->put('name',$req->name);
        // $req->session()->put('email',$req->email);
        // $req->session()->put('address',$req->address);
        
        //SESSION FLASH
        //$req->session()->flash('usernm',$data['username']);
        
        $req->validate([
            'name'=>'required',
            'email'=>'required',
            'password' => 'required',
            ]);

        $result = new User;
        $result->name = $req->name;
        $result->email = $req->email;
        $result->password = Hash::make($req->password);
        $result->save();
        //$req->session()->flash('status','Restauent entered successfully!');    
        return redirect('login');
    }
    function editProfile($id){
        $data = User::find($id);
        return view('editprofile',['data'=>$data]); 
    }
    function updateProfile(Request $req){
        $req->validate([
            'id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
            ]);
        
        $result = User::find($req->id); 
        $result->name = $req->name;
        $result->email = $req->email;
        $result->password = Hash::make($req->password);
        $result->save();
        //$req->session()->flash('status','Restauent updated successfully!');    
        return redirect('/');
    }
}

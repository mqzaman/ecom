<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurent;
use Illuminate\Support\Facades\Session;
class RestoController extends Controller
{
    function index()
    {
        return view('home');
    }
    function list(){
        $data=Restaurent::all();
        return view('list',["data"=>$data]);
    }
    function add(Request $req){
        $req->validate([
            'name'=>'required',
            'email'=>'required'
            ]);
        // return $req->input();
        
        // $req->session()->put('name',$req->name);
        // $req->session()->put('email',$req->email);
        // $req->session()->put('address',$req->address);
        
        //SESSION FLASH
        //$req->session()->flash('usernm',$data['username']);

        $result = new Restaurent;
        $result->name = $req->name;
        $result->email = $req->email;
        $result->address = $req->address;
        $result->save();
        $req->session()->flash('status','Restauent entered successfully!');    
        return redirect('list');
    }
    function delete($id){
        Restaurent::find($id)->delete();
        Session::flash('status','Restauent has been deleted successfully!');
        return redirect('list');
    }
    function edit($id){
        $data = Restaurent::find($id);
        return view('edit',['data'=>$data]); 
    }
    function update(Request $req){
        $req->validate([
            'id'=>'required',
            'name'=>'required',
            'email'=>'required'
            ]);
        
        $result = Restaurent::find($req->id); 
        $result->name = $req->name;
        $result->email = $req->email;
        $result->address = $req->address;
        $result->save();
        $req->session()->flash('status','Restauent updated successfully!');    
        return redirect('list');
    }
}

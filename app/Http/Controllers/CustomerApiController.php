<?php

namespace App\Http\Controllers;
use App\Customer;
use App\User;

use Illuminate\Http\Request;

class CustomerApiController extends Controller
{

    public function __construct()
    {
        $this->middleware('token')->except(['login']);
    }

    public function index()
    {
        return (Customer::all());
    }

    public function view($id)
    {
    	return Customer::find($id);
    }

    public function create()
    {
    	$customer=new Customer();
    	$customer->name=request()->name;
    	$customer->email=request()->email;
    	$customer->phone=request()->phone;
    	$customer->address=request()->address;
    	$customer->save();

    	return $customer;
    }

    public function update($id)
    {
    	$customer=Customer::find($id);
    	$customer->name=request()->name;
    	$customer->email=request()->email;
    	$customer->phone=request()->phone;
    	$customer->address=request()->address;
    	$customer->save();
    	
    	return $customer;
    }

    public function delete($id)
    {
    	$customer=Customer::find($id);
    	$customer->delete();
    	
    	return $customer;
    }

    public function login()
    {
        $login=auth()->attempt([
            'email'=>request()->email,
            'password'=>request()->password
        ]);

        if($login){
            $token=str_random(32);

            $user=User::where('email',request()->email)->first();
            $user->token=$token;
            $user->save();

            return response()->json(['token'=>$token],200);
        }

        return response()->json([
            'error'=>'Invalid email or password'
        ],403);
    }
}

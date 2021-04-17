<?php

namespace App\Http\Controllers;
/* Password encryption using hash */
use Illuminate\Support\Facades\Hash;
/* Getting post values using Request */
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class UserController extends Controller
{
    /* Verify login details */
    public function login(Request $req)
    {
        //return $req->input();
        //DB::enableQueryLog();
        //When user login , checkwith database if the user exist or not
        $user=User::where(['email'=>$req->email])->first();
        //dd(DB::getQueryLog());

        
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return   redirect('/error');
        }
        else
        {   
            //Starting Session 
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
    /* Registraion for new User */
    public function register(Request $req)
    {
        //return $req->input();
        $user=new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->save();
        return   redirect('/login');

    }
}

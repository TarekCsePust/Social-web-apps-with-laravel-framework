<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
use App\Post;
use Auth;

class UserController extends Controller
{
    public function getLogin()
    {
        if(Auth::check())
        {
            return redirect()->route('dashboard');
        }
        else
        {
            return view('welcome');
        }
    }
    
    public function postSignUp(Request $request)
    {
        $this->validate($request,
            [ 
               'email'=>'required|email|unique:users',
               'name'=>'required|max:120',
               'password'=>'required|min:6'
            ]
            );
    	$name = $request['name'];
    	$email = $request['email'];
    	$password = bcrypt($request['password']);
    	$user = new User();
    	$user->email = $email;
    	$user->name = $name;
    	$user->password = $password;
        Auth::login($user);
    	$user->save();
    	return redirect()->route('dashboard');
    }

     public function postSignIn(Request $request)
    {

        $this->validate($request,
            [ 
               'email'=>'required',
               'password'=>'required'
            ]
            );
    	if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password'],'approval'=>1]))
        {
            
                return redirect()->route('dashboard');
    
           
        }
        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function getAccount()
    {
        return view('account')->with('user',Auth::user());
        //return "hello";
    }

    public function postSaveAccount(Request $request)
    {
        
        $this->validate($request,
            [ 
               'name'=>'required',
               //'image'=>'required'
            ]
            );
        $user = Auth::user();
        $user->name = $request['name'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['name'].'-'.$user->id.'.jpg';
        if($file)
        {
            Storage::disk('local')->put($filename,File::get($file));
        }
        else
        {
            if(Storage::disk('local')->has($filename))
            {
                Storage::disk('local')->delete($filename);
            }
        }

         //return view('account')->with('user',Auth::user());
        //return "ww";
        return redirect()->back();
      //getAccount();
    }



   

    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file,200);
        //return "nw";
    }


    public function test_val()
    {
        $users = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->select('users.*', 'posts.body')
            ->get();
        
        return view('test')->with('users',$users);
    }
}

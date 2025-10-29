<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        //$users = DB::table('users')->paginate(50);
        return view( 'index', ['users' => $users] );
    }

    public function create()
    {
        return view( 'newuser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $request->input('fullname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
        return redirect()->route('index')->with('success', 'User inserted successfully');
        
    }

    public function updateuser(Request $request)
    {
        $user = User::find($request->id);        
        if($user) {
            $request->validate([      
                //'id' => 'required|integer|exists:users,id',          
                'fullname' => 'required|string',
            ]);
            
            $user->name = $request->input('fullname');
            $user->updated_at = now();
            $user->save();

            return redirect()->route('index')->with('success', 'User updated successfully');
        }
    }
    

    public function show($id)
    {
        $user = User::find( $id );
        return view( 'profile', compact( 'user' ) );
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('newuser', compact( 'user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->delete()){
            return redirect( url( 'index' ) )->with( 'success', 'User deleted successfully');
        }else{
            return redirect( url( 'index' ) )->with( 'failed', 'Something wrong');
        }
    }
    public function testmail($userid)
    {   
        $user = User::find($userid);
        $email = $user->email;
        $name = $user->name;
        dd('need to remove dd & configer smtp');
        Mail::to($email)->send(new TestMail($name));
        return redirect(url( 'index'))->with( 'success', 'Email successfully sent to '. $name);
    }
}

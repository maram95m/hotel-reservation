<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Input;
class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create(request(['name','email', 'password']));
        if(empty($user)) { // Failed to register user
            return back()->withErrors([
                'message' => 'The registration failed, please try again'
            ]);
        }
        auth()->login($user);
        $name = Input::get('name');
        $userId = Auth::id();
        return response()
            ->json(["ID"=>  $userId,'Username' =>  $name ]);
       // return redirect()->to('/');
    }
///////////
    protected function registered(Request $request, $user)
    {
        $user->generateToken();

        return response()->json(['data' => $user->toArray()], 201);
    }
}

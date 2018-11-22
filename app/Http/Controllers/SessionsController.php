<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\User;
class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        if (auth()->attempt(request(['name', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The Username or password is incorrect, please try again'
            ]);
        }
        $name = Input::get('name');
        $password = Input::get('password');
        $userId = Auth::id();

        return response()
            ->json(["ID"=>  $userId,'Username' =>  $name , 'password' => $password]);

        // return redirect()->to('/');
    }


    public function destroy()
    {
        auth()->logout();

        return redirect()->to('/');
    }

}

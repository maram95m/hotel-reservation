<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\roomModel;
use Auth;
use Illuminate\Support\Facades\Input;
class RoomCOntrollers extends Controller
{
    //

    public function create()
    {
        return view('Rooms.create');
    }
    public function submit()
    {
        $this->validate(request(), [
            'room_code' => 'required',
            'hotel_id' => 'required'
        ]);

        $room= roomModel::create(request(['room_code', 'hotel_id']));
        if(empty($room)) { // Failed to register user
            return back()->withErrors([
                'message' => 'The creation failed, please try again'
            ]);
        }

        $rooms = new roomModel();
        $rooms->room_code = Input::get('room_code');
        $rooms->hotel_id =  Input::get('hotel_id');

        $rooms->save();


        return response()
            ->json(["room_code" =>  Input::get('room_code') ,"hotel_id"=>Input::get('hotel_id')]);
        // return redirect()->to('/');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hotel;
use Auth;
use Illuminate\Support\Facades\Input;

class Hotels extends Controller
{
    //

    public function create()
    {
        return view('Hotels.create');
    }

//    public  function submit(Request $request){
//       $this->validate($request,[
//           'hotel_name'=>'required',
//           'rate' => 'required'
//       ]);
//        $hotel = new hotel;
//        $name = Input::get('hotel_name');
//        $rate = Input::get('rate');
//
//        $hotel->hotel_name = $request->input;
//        $hotel->rate = $request->input('$rate') ;
//
//        $hotel->save();
//        return redirect()->to('/');
//    }

    public function submit()
    {
        $this->validate(request(), [
            'hotel_name' => 'required',
            'rate' => 'required'
        ]);

        $hotel= hotel::create(request(['hotel_name', 'rate']));
        if(empty($hotel)) { // Failed to register user
            return back()->withErrors([
                'message' => 'The creation failed, please try again'
            ]);
        }

        $hotel = new hotel;
      $hotel->hotel_name = Input::get('hotel_name');
       $hotel->rate =  Input::get('rate');

      $hotel->save();


        return response()
            ->json(["Hotel_name" =>  Input::get('hotel_name') ,"Rate"=>Input::get('rate')]);
        // return redirect()->to('/');
    }


    public function  getHotelList(){
        $List = hotel::all();

        return response()
            ->json(["List" => $List]);


        //return view('Hotel')->with('Hotel');
    }

    public function  getHotelByID(){

        $id = Input::get('id');

        $List = hotel::find($id);

        $name = $List->hotel_name;

        return response()
            ->json(["name" => $name]);


        //return view('Hotel')->with('Hotel');
    }

}

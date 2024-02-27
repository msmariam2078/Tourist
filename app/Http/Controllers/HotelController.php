<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class HotelController extends Controller
{
    use Traits\TestData;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels=Hotel::all();
        $this->test( $hotels,"hotels");
        return view('hotel/index_hotel',['hotels'=>$hotels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city=City::all();
        return view('hotel/add_hotel',['city'=>$city]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->IsMethod("post"))
        {    $validate=Validator::make($request->all(),[
            'name'=>'required|string|unique:hotels,name|regex:/^[A-Za-z]+$/',
           ]);
           $this->test($validate);

              Hotel::create(['name'=>$request->name,
              'city_id'=>$request->city,
             ]);
               return redirect()->to(route("index_hotel"));    
 
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $hotel = Hotel::where("name",$request->name)->first();
        $this->test($hotel,"hotel");
        return view("hotel.one",["hotel"=>$hotel]);
    }
    public function showForm(){
        return view("hotel.form");
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->to(route("index_hotel"));   
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Customer;
use App\Models\Hotel;
use App\Models\Customers_Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class RatingController extends Controller
{
    use Traits\TestData;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings = Rating::all();
        $customers = Customer::whereIn("id",Rating::pluck("customer_id")->toArray())->get();
        $this->test($ratings,"ratings");
        $this->test($customers,"customers");
        return view("ratings.all", ["customers"=> $customers,"ratings"=> $ratings]);
    }
    public function customerRatings(Customer $customer){
        $ratings = Rating::where("customer_id",$customer->id)->get();
        $this->test($ratings,"customer ratings");
        return view("ratings.customer",["customer"=> $customer,"ratings"=> $ratings]);
    }
    public function allHotelsRatings(){
        $hotels = Hotel::whereIn("id",Rating::pluck("hotel_id")->toArray())->get();
        $this->test($hotels,"rated hotels");
        return view("ratings.hotels",["hotels"=> $hotels]);
    }
    public function hotelRatingsForm(){
        return view("ratings.hotelform");
    }
    public function hotelRatings(Request $request){
        $hotel = Hotel::where("name",$request->name)->first();
        $this->test($hotel,"hotel");
        $ratings = Rating::where("hotel_id",$hotel->id)->get();
        $this->test($ratings,"ratings");
        return view("ratings.hotel",["hotel"=>$hotel]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function emailChoosen($hotel_id){
        $customers = Customer::whereIn("id",Customers_Hotel::where("hotel_id", $hotel_id)->pluck("customer_id")->toArray())->get();
        $this->test($customers,"reservesd customers");
        return view("ratings.cemails",["customers"=>$customers,"hotel_id"=>$hotel_id]);
    }
    public function create(Request $request)
    {
        
        $rating = Rating::where("customer_id",$request->customer_id)->where("hotel_id",$request->hotel_id)->first();
        if($rating)
         return redirect()->to(route("edit_rating",["rating"=>$rating]));
    
        return view("ratings.add",["request"=>$request]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "customer_id"=>"required|integer|exists:customers,id",
            "hotel_id"=>"required|integer|exists:hotels,id|in:" . implode(',',Customers_Hotel::where("customer_id",$request->customer_id)
            ->pluck("hotel_id")->toArray()),
            "rate"=>"required|integer|min:0|max:5",
            "comment"=>"nullable|string|min:0|max:255"
        ],["hotel_id.in"=>"you cant rate hotel you didn't reserve it before"]);
        $this->test($validate);
        Rating::create(["customer_id"=>$request->customer_id,"hotel_id"=>$request->hotel_id,"rate"=>$request->rate,"comment"=>$request->comment]);
        return redirect()->to(route("all_ratings"));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        return view("ratings.edit", ["rating"=>$rating]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
        $validate = Validator::make(["id"=>$rating->id,"customer_id"=>$rating->customer_id,"hotel_id"=>$rating->hotel_id,"rate"=>$request->rate,"comment"=>$request->comment],[
            "id"=>"required|integer|exists:ratings,id",
            "customer_id"=>"required|integer|exists:customers,id",
            "hotel_id"=>"required|integer|exists:hotels,id|in:" . implode(',',Customers_Hotel::where("customer_id",$rating->customer_id)->pluck("hotel_id")->toArray()),
            "rate"=>"required|integer|min:0|max:5",
            "comment"=>"nullable|string|min:0|max:255"
        ],["hotel_id.in"=>"you cant rate hotel you didn't reserve it before"]);
        $this->test($validate);
        $rating->rate = $request->rate;
        $rating->comment = $request->comment;
        $rating->save();
        return redirect()->to(route("all_ratings"));
    }
}

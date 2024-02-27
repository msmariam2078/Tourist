<?php

namespace App\Http\Controllers;

use App\Models\Customers_Hotel;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomersHotelController extends Controller
{
    use Traits\TestData;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::whereIn("id",Customers_Hotel::pluck("customer_id")->toArray())->get();
        $this->test($customers,"customers");
        return view("reserves.all", ["customers"=>$customers]);
    }
    public function show(Customer $customer){
        $validate = Validator::make(["cid"=>$customer->id],[
            "cid" => "required|integer|exists:customers_hotels,customer_id",
        ],["cid.exists" => "the customer has no reserved hotels"]);
        $this->test($validate);
        return view("reserves.one",["customer"=>$customer]);
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
            "customer_id" => "required|integer|exists:customers,id",
            "hotel_id"=>"required|integer|exists:hotels,id",
        ]);
        $this->test($validate);
        Customers_Hotel::create(["customer_id"=>$request->customer_id,"hotel_id"=>$request->hotel_id]);
        return redirect()->to(route("reserved/all"));
    }
}

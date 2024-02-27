<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CustomerController extends Controller
{
    use Traits\TestData;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        $this->test($customers,"customers");
        return view("customers.all", ["customers"=> $customers]);
    }
    public function bookedCostomers(){
        $customers = Customer::whereIn("id",Booking::pluck("customer_id"))->get();
        $this->test($customers,"customers");
        return view("customers.all",["customers"=>$customers]);
    }
    public function customerForm(){
        return view("customers.oneform");
    }
    public function customerFromEmail(Request $request){
        $customer = Customer::where("email",$request->email)->first();
        $this->test($customer,"customer");
        return view("customers.one", ["customer"=> $customer]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("customers.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = ["gender.in" => "The Gender Must Be (male or fmale)"];
        $validate = Validator::make($request->all(), [
            "email"=> "required|email|max:20|unique:customers,email|ends_with:yahoo.com,hotmail.com,gmail.com",
            "mobile"=>"required|string|unique:customers,mobile|regex:/^(09)[0-9]{8}$/",
            "name"=>"required|string|min:3|max:20|regex:/^[A-Za-z]+$/",
            "gender"=>"required|string|in:male,fmale"
        ],$message);
        $this->test($validate);
        Customer::create(["name"=>$request->name,"mobile"=>$request->mobile,"gender"=>$request->gender,"email"=>$request->email]);
        return redirect()->to(route("all_customers"));
    }
   /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view("customers.one", ["customer"=> $customer]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view("customers.edit", ["customer"=> $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $message = ["gender.in" => "The Gender Must Be (male or fmale)","id.not_in"=>"The Customer has booking"];
        $validate = Validator::make(["id"=>$customer->id,"email"=>$request->email,"mobile"=>$request->mobile,"name"=>$request->name,"gender"=>$request->gender], [
            "id"=>"required|integer|exists:customers,id|not_in:" . implode(',',Booking::pluck("customer_id")->toArray()),
            "email"=> "required|email|max:20|unique:customers,email,$customer->id|ends_with:yahoo.com,hotmail.com,gmail.com",
            "mobile"=>"required|string|unique:customers,mobile,$customer->id|regex:/^(09)[0-9]{8}$/",
            "name"=>"required|string|min:3|max:20|regex:/^[A-Za-z]+$/",
            "gender"=>"required|string|in:male,fmale"
        ],$message);
        $this->test($validate);
        $customer->name = $request->name;
        $customer->mobile = $request->mobile;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->save();
        return redirect()->to(route("all_customers"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $validate = Validator::make(["id" => $customer->id],[
            "id"=>"required|integer|exists:customers,id|not_in:" . implode(',',Booking::pluck("customer_id")->toArray())
        ],["id.not_in"=>"the customer has booking"]);
        $this->test($validate);
        $customer->delete();
        return redirect()->to(route("all_customers"));
    }
}

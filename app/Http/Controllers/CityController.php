<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Ticket;
use App\Http\traits\GeneralTrait;
class CityController extends Controller
{   use Traits\TestData;
   use  GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities=City::all();
        return $this->apiResponse($cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('city/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [     
            "city"=>"required|string|unique:cities,name|min:3|max:20|regex:/^[A-Za-z]+$/",
            "country"=>"required|string|min:3|max:20|regex:/^[A-Za-z]+$/",
    ]);
     $this->test($validate);
     City::create(["name"=>$request->city,"country"=>$request->country]);
     return redirect()->to(route("index-cities"));
    }

    public function add(Request $request)
    {
        $validate = Validator::make($request->all(), [     
            "city"=>"required|string|unique:cities,name|min:3|max:20|regex:/^[A-Za-z]+$/",
            "country"=>"required|string|min:3|max:20|regex:/^[A-Za-z]+$/",
    ]);
    if($validate->fails())
    {
        return $this->requiredField($validate->errors()->first());
    }
     //$this->test($validate);
     $city=City::create(["name"=>$request->city,"country"=>$request->country]);
     if($city)
     {return $this->apiResponse('added',true, $error=null, $statusCode = 200);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TicketController extends Controller
{     use Traits\TestData;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter()
    {   $ticket=Ticket::all();
        $this->test( $ticket,"tickets");
        $city=City::all();
        return view('home',['ticket'=>$ticket,'city'=>$city]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function show(Request $request)
     {   if($request->IsMethod("post"))
        {  $validate=Validator::make($request->all(),[
            'date'=>'required|date|after_or_equal:now|nullable',
            'city'=>'exists:cities,id'
           ]);  
       
            $this->test($validate); 
          
          $date_s=$request->date;
         $city_id=$request->city;
        $ticket=Ticket::where('city_id',$city_id)->where('date_s',$date_s)->get();
        $this->test( $ticket,"tickets");
        $city=City::all();
        return view('home',['ticket'=>$ticket,'city'=>$city]);
     }}


   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(){
        $city=City::all();
        $company=Company::all();
        return view('ticket/addticket',['company'=>$company,'city'=>$city]);




    }
    public function destroy(Ticket $ticket){

        $validate=Validator::make(['id'=>$ticket->id],[
          
            'id'=>'integer|exists:tickets,id']);
           
            $this->test($validate);
      $ticket->delete();
      return redirect()->to(route('home'));
     
    }
     
    

    public function store(Request $request)
    {
        if($request->IsMethod("post"))
        { 

            $validate=Validator::make($request->all(),[
                'company'=>'required|integer|exists:companies,id',
                'city'=>'required|integer|exists:cities,id',
                'date_s'=>'date|required|after_or_equal:now',
                'date_e'=>'date|required|after_or_equal:date_s']);
                
               $this->test($validate);
                    $company_id=$request->company;
                    $city_id= $request->city;
                   $date_s=$request->date_s;
                   $date_e=$request->date_s;
                   $exist=false;
                 $tickets=Ticket::where('company_id',$company_id)->where('company_id',$city_id)->get();
                       
                        foreach($tickets as $ticket)
                    {if($ticket->date_s==$date_s)
                       {$exist=true;
                        break;
                        }
                    }
                 
                   
                     $address_company=Company::find($company_id)->address;
                    $city_name=City::find($city_id)->name;
                  
               
                  if( !str_contains($address_company,$city_name)&&$exist==false){
 
                            Ticket::create(
                     ['company_id'=>$company_id,
                     'city_id'=>$city_id,
                     'date_s'=>$date_s,
                     'date_e'=>$date_e ]);
                     return view('success');
                  }
                  else{
                    
                    return view('errors',['message'=>'not allowed to add this ticket']);
                  }
        
                
                
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
  
}
}
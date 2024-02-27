<?php
namespace App\Http\Controllers\Traits;

trait TestData{
    public function test($data,$message = NULL){
       if($message){
          if(!array_filter((array)$data)){
               die(view("errors",["message"=>"$message not found"]));
      }}
       else
        if($data->fails())
          die(view("errors",["message"=> $data->errors()]));
    }
}
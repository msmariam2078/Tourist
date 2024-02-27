<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ["name","city_id"];
    protected $casts = [
        "name"=> "string",
        "city_id"=>"integer"
    ];

public function city() : object{
    return $this->belongsTo(City::class);
}



    public function bookings() : object{
    return $this->hasMany(Booking::class);
    }


    public function ratings() : object{
        return $this->hasMany(Rating::class);
    }
     

    public function customersReserved() : object{
        return $this->belongsToMany(Customer::class,"hotels_customers");
    }
    public function customersRatedWithRate() : object {
        return $this->belongsToMany(Customer::class,"ratings")->withPivot(["rate","comment"]);
    }
    public function bookCustomers() : object{
        return $this->belongsToMany(Customer::class,"bookings")->withPivot("book_date");
    }
    public function bookTickets() : object{
        return $this->belongsToMany(Ticket::class,"bookings")->withPivot("book_date");
    }

 
}

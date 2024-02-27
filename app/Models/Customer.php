<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        "name","mobile","gender","email"
    ];
    protected $casts = [
        "name"=> "string",
        "mobile"=> "string",
        "gender"=> "string",
        "email"=> "string"
    ];
    public function tikets() : object{
        return $this->belongsToMany(Ticket::class,"bookings");
    }
    public function bookhotels() : object{
        return $this->belongsToMany(Hotel::class,"bookings")->withPivot("book_date");
    }
    public function hotelsRatingWithRatedHotels() : object{
        return $this->belongsToMany(Hotel::class,"ratings")->withPivot(["rate","comment"]);
    }
    public function ratings() : object{
        return $this->hasMany(Rating::class);
    }
    public function reservedHotels() 
    
    {
        return $this->belongsToMany(Hotel::class,"customers_hotels");
    }
    public function bookings() : object{
        return $this->hasMany(Booking::class);
    }














































}

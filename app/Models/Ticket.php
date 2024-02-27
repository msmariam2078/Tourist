<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'city_id',
        'date_s',
        'date_e'
    ];
    protected $casts = [
        "company_id"=> "integer",
        "city_id"=> "integer",
        "date_s"=> "datetime",
        "date_e"=> "datetime"
    ];

public function company() : object{

 return $this->belongsTo(Company::class);
}
public function city() : object{
    
 return $this->belongsTo(City::class);
}
public function customers() : object{
    return $this->belongsToMany(Customer::class,"bookings");
}
public function hotels() : object{
    return $this->belongsToMany(Hotel::class,"bookings")->withPivot("book_date");
}
public function bookings() : object{
    return $this->hasMany(Booking::class);
}

}
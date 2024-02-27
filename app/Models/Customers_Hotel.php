<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers_Hotel extends Model
{
    use HasFactory;
    protected $table = "customers_hotels";
    protected $fillable = [
        "customer_id","hotel_id"
    ];
    protected $casts = [
        "customer_id"=> "integer",
        "hotel_id"=> "integer"
    ];
    public function customer() : object{
        return $this->belongsTo(Customer::class);
    }
    public function hotel() : object{
        return $this->belongsTo(Hotel::class);
    }
}

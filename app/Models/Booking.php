<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;
use App\Models\Customer;
use App\Models\Hotel;
class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'customer_id',
        'hotel_id',
        'book_date'
    ];
    protected $casts = [
        "ticket_id"=> "integer",
        "customer_id"=> "integer",
        "hotel_id"=> "integer",
        "book_date"=> "datetime"
    ];
    public function ticket() : object{

     return $this->belongsTo(Ticket::class);



    }
    public function customer() : object{

        return $this->belongsTo(Customer::class);
   
   
   
       }
       public function hotel() : object{

        return $this->belongsTo(Hotel::class);
   
   
   
       }
























     

}

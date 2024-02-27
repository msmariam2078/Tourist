<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable=['title','address','phone'];
    protected $casts = [
        "title"=> "string",
        "address"=>"string",
        "phone"=> "string",
    ];

    public function tickets() : object{
        return $this->hasMany(Ticket::class);
    }
    public function toCities() : object{
       return $this->belongsToMany(City::class,"tickets")->withPivot(["date_s","date_e"]);
    }
}

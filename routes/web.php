<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CustomersHotelController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/", function () {
    return view('welcome');
});
Auth::routes();
Route::get("home",  [App\Http\Controllers\TicketController::class,'filter'])->name("home")->middleware("auth");
//--------------------------------------Customer Routes------------------------------------------------------------//
Route::get("customers/all",[CustomerController::class,"index"])->name("all_customers")->middleware("auth");
Route::get("customer/edit/{customer}",[CustomerController::class,"edit"])->name("edit_customer")->middleware("auth");
Route::get("customer/delete/{customer}",[CustomerController::class,"destroy"])->name("delete_customer")->middleware("auth");
Route::get("customer/add/form",[CustomerController::class,"create"])->name("customer_form")->middleware("auth");
Route::get("customer/one/{customer}",[CustomerController::class,"show"])->name("one_customer")->middleware("auth");
Route::get("customer/infos",[CustomerController::class,"customerForm"])->name("one_customer_form")->middleware("auth");
Route::get("customers/booked",[CustomerController::class,"bookedCostomers"])->name("booked_customers")->middleware("auth");
Route::post("customer/update/{customer}",[CustomerController::class,"update"])->name("update_customer")->middleware("auth");
Route::post("customer/add",[CustomerController::class,"store"])->name("add_customer")->middleware("auth");
Route::post("customer/email",[CustomerController::class,"customerFromEmail"])->name("email_customer")->middleware("auth");
//--------------------------------End of Customer Routes----------------------------------------------------------//
Route::get("ratings/all",[RatingController::class,"index"])->name("all_ratings")->middleware("auth");
Route::get("rating/edit/{rating}",[RatingController::class,"edit"])->name("edit_rating")->middleware("auth");
Route::get("reserved/all",[CustomersHotelController::class,"index"])->name("all_reserved")->middleware("auth");
Route::get("reserved/one/{customer}",[CustomersHotelController::class,"show"])->name("one_reserved")->middleware("auth");
Route::get("rating/add/form/{customer_id}/{hotel_id}",[RatingController::class,"create"])->name("rating_form")->middleware("auth");
Route::get("ratings/all/hotels",[RatingController::class,"allHotelsRatings"])->name("all_hotels_ratings")->middleware("auth");
Route::get("rating/customer/{customer}",[RatingController::class,"customerRatings"])->name("customer_ratings")->middleware("auth");
Route::get("rating/hotel/{name}",[RatingController::class,"hotelRatings"])->name("hotel_ratings")->middleware("auth");
Route::get("rating/customer/form/{hotel_id}",[RatingController::class,"emailChoosen"])->name("customer_rating_form")->middleware("auth");
Route::post("rating/update/{rating}",[RatingController::class,"update"])->name("update_rating")->middleware("auth");
Route::post("rating/add",[RatingController::class,"store"])->name("add_rating")->middleware("auth");
Route::post("rating/add/form",[RatingController::class,"create"])->name("post_form")->middleware("auth");
//--------------------------------End of Ratings and Reserved Routes----------------------------------------------//
Route::get("/booksview", [App\Http\Controllers\BookingController::class,'index'])->name('books')->middleware("auth");
Route::get("/add/book/{id}", [App\Http\Controllers\BookingController::class,'create'])->name('add-book')->middleware('auth');
Route::post("/create/book/{id}", [App\Http\Controllers\BookingController::class,'store'])->name('create-book')->middleware("auth");;
Route::get("/bookedit/{booking}", [App\Http\Controllers\BookingController::class,'edit'])->name ('edit')->middleware("auth");;
Route::post("/update/book/{booking}", [App\Http\Controllers\BookingController::class,'update'])->name('update-book')->middleware("auth");;
Route::post("/bookfilter", [App\Http\Controllers\BookingController::class,'filterbooking'])->name('filter-book')->middleware("auth");;
Route::get("/delete/book/{booking}", [App\Http\Controllers\BookingController::class,'delete'])->name('delete')->middleware("auth");;

Route::get("/tickview", [App\Http\Controllers\TicketController::class,'filter'])->name('tickets')->middleware("auth");;
Route::post("/filter/ticket", [App\Http\Controllers\TicketController::class,'show'])->name('filtered-ticket')->middleware("auth");;
Route::get("ticket/addticket", [App\Http\Controllers\TicketController::class,'add'])->name('add-ticket')->middleware("auth");;
Route::post("/create/ticket", [App\Http\Controllers\TicketController::class,'store'])->name('create-ticket')->middleware("auth");;
Route::get("/delete/ticket{ticket}", [App\Http\Controllers\TicketController::class,'destroy'])->name('delete-ticket')->middleware("auth");;
//------------------------------------- Hotel Routes -----------------------------------------------------------------//
Route::get("/hotelindex", [App\Http\Controllers\HotelController::class,'index'])->name('index_hotel')->middleware("auth");
Route::get("/hotelcreate/{id}", [App\Http\Controllers\HotelController::class,'create'])->name('create_hotel')->middleware("auth");
Route::post("/onehotel",[App\Http\Controllers\HotelController::class,"show"])->name("one_hotel")->middleware("auth");
Route::post("/hotelstore", [App\Http\Controllers\HotelController::class,'store'])->name('store_hotel')->middleware("auth");
Route::get("/deletehotel{hotel}", [App\Http\Controllers\HotelController::class,'destroy'])->name('delete-hotel')->middleware("auth");
Route::get("/hotel/form",[App\Http\Controllers\HotelController::class,"showForm"])->name("hotel_form")->middleware("auth");
//-----------------------------------------End Hotels ---------------------------------------------------------------//
Route::get('/index', [CompanyController::class, 'index'])->name('Company.index')->middleware('auth');
// returns the form for adding a post
Route::get('/Company/create',[CompanyController::class, 'create'])->name('Company.create')->middleware('auth');
// adds a post to the database
Route::post('/Company',[CompanyController::class, 'store'])->name('Company.store')->middleware('auth');
// returns a page that shows a full company
Route::get('/Company/{company}',[CompanyController::class, 'show'])->name('Company.show')->middleware('auth');
// returns the form for editing a company
Route::get('/Company/{company}/edit',[CompanyController::class, 'edit'])->name('Company.edit')->middleware('auth');
// updates a company
Route::put('/Company/{company}',[CompanyController::class, 'update'])->name('Company.update')->middleware('auth');
// deletes the company
Route::delete('/Company/{company}',[CompanyController::class, 'destroy'])->name('Company.destroy')->middleware('auth');
//----------------------------------------end cumpany---------------------------------------------------------------//
Route::get('city/index',[App\Http\Controllers\CityController::class,'index'])->name('index-cities');
Route::get('city/create',[App\Http\Controllers\CityController::class,'create'])->name('create-city');
Route::post('city/add',[App\Http\Controllers\CityController::class,'store'])->name('add-city');



Route::get('/log',function(){
    return \Log::info("started thee app");
});

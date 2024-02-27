<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
     use Traits\TestData;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
  {
    $companies = Company::all();
    $this->test($companies,"companies");
    return view('Company.index', compact('companies'));
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
      'title' => 'required|string|min:8|max:50|regex:/^[A-Za-z]+$/|unique:companies,title',
      'address' => 'required|string|min:8|max:50|regex:/^[A-Za-z]+(-)[A-Za-z]+(-)[A-Za-z0-9]+$/',
      'phone' => "required|string|unique:companies,phone|regex:/^(09)[0-9]{8}$/",

    ]);
    $this->test($validate);
    $address = strtolower($request->address);
    if(!str_contains($address,"syria"))
     $this->test(null,"syria in address");
    Company::create($request->all());

    return redirect()->route('Company.index')
      ->with('success', 'company created successfully.');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id){
    $validate = Validator::make(["id"=>$id],[
      "id" => "required|integer|exists:companies,id",
    ]);
    $this->test($validate);
    $company = Company::find($id);
    $company->delete();
    return redirect()->route('Company.index')
      ->with('success', 'Company deleted successfully');
  }
  // routes functions
  /**
   * Show the form for creating a new post.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('Company.create');
  }
}

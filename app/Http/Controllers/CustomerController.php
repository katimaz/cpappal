<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use App\Customer;
use Response;
use DB;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all()->sortByDesc("id");
        return view('admin.customer.index',compact('customers'));
    }

    public function getCustomers(){

        $customers = DB::table('customers')->select('id','name','phone','address','remark','updated_by','updated_at')->orderBy("id",'desc')->get();
        $Response = ['data' => $customers];

        return Response::json($Response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $countries = Country::all();
        return view('admin.customer.add',compact('countries'));
    }

    public function create(Request $request)
    {
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->country_name = $request->country_name;
        $customer->address = $request->address;
        $customer->delivery_address = $request->delivery_address;
        $customer->phone = $request->phone;
        $customer->remark = $request->remark;
        $customer->save();

        return redirect()->route('customer')->with('success', true)->with('message','Customer created successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        $countries = Country::all();

        return view('admin.customer.edit',compact('customer','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $customer = Customer::find($request->id);
        $customer->country_name = $request->country_name;
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->delivery_address = $request->delivery_address;
        $customer->phone = $request->phone;
        $customer->remark = $request->remark;
        $customer->save();
        return redirect()->route('customer')->with('success', true)->with('message','Customer updated successfully!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Customer::destroy($request->id);
        return redirect()->route('customer');
    }
}

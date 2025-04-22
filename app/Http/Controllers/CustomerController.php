<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function customer(Request $request)
    {
        $module = 'customer';
        return view('admin.customer.customer', ['module' => $module]);
    }

    public function fetchCustomerRecord(Request $request)
    {
        $customer = new Customer();
        $data = $customer->all();
        return response()->json($data);
    }

    public function createCustomerRecord(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->alt_phone = $request->alt_phone;
        $customer->address = $request->address;
        $customer->save();
        return response()->json([
            'status'=>"create successfully",
            'data'=>$customer,
        ]);
    }

    public function updateCustomerRecord(Request $request)
    {
        $customer = Customer::find($request->id);
        if ($customer){
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->alt_phone = $request->phone;
            $customer->address = $request->address;
            $customer->save();
        }
        return response()->json([
            'status'=>"update successfully",
            'data'=>$customer,
        ]);
    }

    public function deleteCustomerRecord(Request $request){
        $customer = Customer::find($request->id);
        if ($customer){
            $customer->delete();
        }
        return response()->json($customer);
    }
}

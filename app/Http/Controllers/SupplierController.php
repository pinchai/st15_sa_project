<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //
    public function supplier(Request $request)
    {
        $module = 'supplier';
        return view('admin.supplier.supplier', ['module' => $module]);
    }

    public function fetchSupplierRecord(Request $request)
    {
        $supplier = new Supplier();
        $data = $supplier->all();
        return response()->json($data);
    }

    public function createSupplierRecord(Request $request)
    {
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->save();
        return response()->json([
            'status'=>"create successfully",
            'data'=>$supplier,
        ]);
    }

    public function updateSupplierRecord(Request $request)
    {
        $supplier = Supplier::find($request->id);
        if ($supplier){
            $supplier->name = $request->name;
            $supplier->phone = $request->phone;
            $supplier->address = $request->address;
            $supplier->save();
        }
        return response()->json([
            'status'=>"update successfully",
            'data'=>$supplier,
        ]);
    }

    public function deleteSupplierRecord(Request $request){
        $supplier = Supplier::find($request->id);
        if ($supplier){
            $supplier->delete();
        }
        return response()->json($supplier);
    }
}

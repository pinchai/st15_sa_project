<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BranchController extends Controller
{
    //
    public function branch(Request $request)
    {
        $module = 'branch';
        return view('admin.branch.branch', ['module' => $module]);
    }

    public function fetchBranchRecord(Request $request)
    {
        $branch = new Branch();
        $data = $branch->all();
        return response()->json($data);
    }

    public function createBranchRecord(Request $request)
    {
        $branch = new Branch();
        $branch->name = $request->name;
        $branch->phone = $request->phone;
        $branch->email = $request->email;
        $branch->location = $request->location;
        $branch->save();
        return response()->json([
            'status'=>"create successfully",
            'data'=>$branch,
        ]);
    }

    public function updateBranchRecord(Request $request)
    {
        $branch = Branch::find($request->id);
        if ($branch){
            $branch->name = $request->name;
            $branch->phone = $request->phone;
            $branch->email = $request->email;
            $branch->location = $request->location;
            $branch->save();
        }
        return response()->json([
            'status'=>"update successfully",
            'data'=>$branch,
        ]);
    }

    public function deleteBranchRecord(Request $request){
        $branch = Branch::find($request->id);
        if ($branch){
            $branch->delete();
        }
        return response()->json($branch);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchSalaryRequest;
use App\Http\Resources\SalariesResource;
use App\salaries;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class SalariesController extends Controller
{

//    the main requirement
    public function index(){
        $salaries=SalariesResource::collection(salaries::selectRaw('month, sum(salary) as salary, sum(bonous) as bonous')
             ->groupBy('month')
            ->orderByDesc('id')
            ->get());
        return response()->json(['data'=>$salaries]);
    }

// jsut used to get the query which send to mail
    public function getMonthSalary(){
        $dt=Carbon::now()->format('M');
         $salaries=salaries::selectRaw('month, sum(salary) as salary, sum(bonous) as bonous')
         ->groupBy('month')
         ->orderByDesc('id')->where('month',$dt)->get();
         return response()->json(['data'=>$salaries]);
    }

    // get the slaries of employee for month
    public function searchSalary(SearchSalaryRequest $request){
        $salaries=salaries::where('month','like','%' . $request->keyword . '%')->orderBy('id', 'asc')->get();
        return response()->json(['data'=>$salaries]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\SalariesResource;
use App\salaries;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalariesController extends Controller
{
    public function index(){




        $salaries=SalariesResource::collection(salaries::selectRaw('month, sum(salary) as salary, sum(bonous) as bonous')
             ->groupBy('month')
            ->orderByDesc('id')
            ->get());
        return response()->json(['data'=>$salaries]);
    }


}

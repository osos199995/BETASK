<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter;

class SalariesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {

    $lastDayofMonth = Carbon::parse($this->month)->endOfMonth()->isoFormat('dddd');
    $themidmonth=Carbon::parse($this->month)->firstOfMonth()->addDays(14)->isoFormat('dddd');

    if ($lastDayofMonth !== 'Friday'   And  $themidmonth !== 'Friday' And $lastDayofMonth !== 'Saturday' And $themidmonth !== 'Saturday'  ) {
        return [
            'month' => $this->month,
            'Salaries_payment_day' => Carbon::parse($this->month)->endOfMonth()->isoFormat('D'),
            'Bonus_payment_day' => Carbon::parse($this->month)->firstOfMonth()->addDays(14)->isoFormat('D'),
            'salaries_total' => '$' . $this->salary,
            'Bonus_total' => '$' . $this->bonous,
            'Payments_total' => "$" . number_format($this->bonous + $this->salary),

        ];
    }
    elseif ($lastDayofMonth == 'Saturday' AND  $themidmonth == 'Saturday') {
        return [
            'month' => $this->month,
            'Salaries_payment_day' => strval(Carbon::parse($this->month)->endOfMonth()->isoFormat('D') - 2),
            'Bonus_payment_day' => Carbon::parse($this->month)->firstOfMonth()->addDays(19)->isoFormat('D'),
            'salaries_total' => '$' . $this->salary,
            'Bonus_total' => '$' . $this->bonous,
            'Payments_total' => "$" . number_format($this->bonous + $this->salary),

        ];
    }elseif ($lastDayofMonth == 'Friday' ){
        return [
            'month' => $this->month,
                'Salaries_payment_day' =>strval(Carbon::parse($this->month)->endOfMonth()->isoFormat('D')-1),
                'Bonus_payment_day'=>Carbon::parse($this->month)->firstOfMonth()->addDays(14)->isoFormat('D'),
                'salaries_total' => '$' . $this->salary,
                'Bonus_total' => '$' . $this->bonous,
                'Payments_total' => "$" . number_format($this->bonous + $this->salary),
            ];
    }
    elseif ($lastDayofMonth == 'Saturday' AND  $themidmonth !== 'Saturday'){
        return [
            'month' => $this->month,
            'Salaries_payment_day' =>strval(Carbon::parse($this->month)->endOfMonth()->isoFormat('D') -2 ),
            'Bonus_payment_day'=>Carbon::parse($this->month)->firstOfMonth()->addDays(14)->isoFormat('D'),
            'salaries_total' => '$' . $this->salary,
            'Bonus_total' => '$' . $this->bonous,
            'Payments_total' => "$" . number_format($this->bonous + $this->salary),

        ];
}elseif ( $themidmonth == 'Friday' ){

            return [
                'month' => $this->month,
                'Salaries_payment_day' =>Carbon::parse($this->month)->endOfMonth()->isoFormat('D'),
                'Bonus_payment_day'=>Carbon::parse($this->month)->firstOfMonth()->addDays(20)->isoFormat('D'),
                'salaries_total' => '$' . $this->salary,
                'Bonus_total' => '$' . $this->bonous,
                'Payments_total' => "$" . number_format($this->bonous + $this->salary),

            ];
        }
        elseif ($themidmonth =='Saturday' AND  $lastDayofMonth !== 'Saturday'){
        return [
            'month' => $this->month,
            'Salaries_payment_day' =>Carbon::parse($this->month)->endOfMonth()->isoFormat('D'),
            'Bonus_payment_day'=>Carbon::parse($this->month)->firstOfMonth()->addDays(19)->isoFormat('D'),
            'salaries_total' => '$' . $this->salary,
            'Bonus_total' => '$' . $this->bonous,
            'Payments_total' => "$" . number_format($this->bonous + $this->salary),

        ];
    }


    }
}

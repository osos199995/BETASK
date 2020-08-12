<?php

namespace App\Console\Commands;

use App\Mail\sendsalaries;
use App\salaries;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Salary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salary:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send_mail_to_admin_monthly';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dt=Carbon::now()->format('M');
      $request = salaries::selectRaw('month, sum(salary) as salary, sum(bonous) as bonous')
          ->groupBy('month')
          ->orderByDesc('id')->where('month',$dt)->first();
    Mail::to('geomohamed1995@gmail.com')->send(new sendsalaries($request));
    }
}

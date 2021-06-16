<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TestCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Testing! Testing!! Testing!!!';

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
        // return 0;
        $allSavings = DB::table('customers')
                    ->join('savings_openings', 'customers.user_id', '=', 'savings_openings.user_id')
                    ->join('savings_products', 'savings_openings.savings_product_id', "=" , "savings_products.id")
                    ->select('customers.first_name','savings_products.name','savings_openings.amount','savings_openings.duration')
                    ->get();
        \Log::info($allSavings);
    }
}

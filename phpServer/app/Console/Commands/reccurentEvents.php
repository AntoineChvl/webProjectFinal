<?php

namespace App\Console\Commands;

use App\Event;
use App\Like;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class reccurentEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reccurent:events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the date of reccurent events';

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
     * @return mixed
     */
    public function handle()
    {
        Event::where('date', '=', today())->update(['date' => DB::raw("date + INTERVAL 1 WEEK")]);
    }
}

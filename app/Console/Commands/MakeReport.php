<?php

namespace App\Console\Commands;

use App\Repositories\DepartmentRepository;
use Illuminate\Console\Command;

class MakeReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:make';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test purpose query trigger';

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
        $repository = new DepartmentRepository();
        $report = $repository->makeReport();
        print_r($report);
    }
}

<?php

namespace App\Console\Commands;

require_once __DIR__ . '/../../../vendor/autoload.php';

use Illuminate\Console\Command;

abstract class BooksCommand extends Command
{
    protected const MARKUP = 20;
    protected $start = 1;
    protected $paginator = 1;
    protected const URL = 'https://book24.ua';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateGeoJsonCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:geojson';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Geo Jsonを生成する';

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
        //
    }
}

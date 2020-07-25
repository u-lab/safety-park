<?php

namespace App\Console\Commands;

use App\Services\GeoJson\CreateGeoJsonService;
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

    protected CreateGeoJsonService $_service;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CreateGeoJsonService $service)
    {
        $this->_service = $service;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->_service->handler('tokyo');
    }
}

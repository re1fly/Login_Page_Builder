<?php

namespace App\Console\Commands;

use App\Models\Router;
use App\Models\ServiceLocation;
use App\Models\ServiceLocationSmartWifi;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    protected $signature = 'dev-test';
    protected $description = '';

    public function handle()
    {
        try {

            shell_exec('php artisan migrate:fresh');

            $serviceLocation = ServiceLocation::create(['uuid' => '1d31c039-2fe9-4f6d-9e70-113859dba67b']);
            if (!$serviceLocation) {
                $this->error('Create service location is failed!');
                return;
            }

            $router = Router::create([
                'name' => 'Omada',
                'urlIP' => 'https://192.168.1.64:8043'
            ]);
            if (!$router) {
                $this->error('Create router is failed!');
                return;
            }

            $smartWifi = $serviceLocation->smartWifi()->save(new ServiceLocationSmartWifi([
                'routerId' => $router->id,
                'url' => 'http://192.168.3.42/omada/1d31c039-2fe9-4f6d-9e70-113859dba67b/login',
                'username' => 'jessd4G56A',
                'password' => 'k53dtt'
            ]));
            if (!$smartWifi) {
                $this->error('Create smart wifi is failed');
                return;
            }

        } catch (\Exception $exception) {
            $this->error($exception->getMessage());
            return;
        }
    }
}

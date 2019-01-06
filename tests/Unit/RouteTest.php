<?php

namespace Tests\Unit;

use Tests\TestCase;
use Symfony\Component\Process\Process;

class RouteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function routingNoDuplicateTest()
    {
        $duplicate=0;
        $process = new Process('cd /home/vagrant/code/ && php artisan route:list');

        $process->start();

        foreach ($process as $type => $data) {
            if ($process::OUT === $type) {
                $routes_list_raw[] = $data;
            }
        }

        unset($routes_list_raw[count($routes_list_raw)-1],$routes_list_raw[0],$routes_list_raw[1],$routes_list_raw[2]);

        $routes_explode = [];
        foreach(array_values($routes_list_raw) as $index=>$raw_route){
            $route_clean = array_map('trim',preg_split( "/( \||\| )/",$raw_route));

            $key = $route_clean[2].'_'.$route_clean[3];
            if(!in_array($key,$routes_explode)){
                $routes_explode[] = $key;
            }else{
                $duplicate++;
            }
        }

        $this->assertEquals(0,$duplicate);
    }
}

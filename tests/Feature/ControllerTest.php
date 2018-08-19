<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

// include controller
use App\Http\Controllers\Site\DashboardController;
use Request;

class ControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $request = Request::create(route('dashboard','_GET'));
        $DashboardController = new DashboardController;

        // index function of controller returns type view
        $view = $DashboardController->index($request);

        // view data type check
        $this->assertInternalType("string", $view->__get('page'));
        $this->assertInternalType("object", $view->__get('drivers'));

        // view data values check
        $this->assertEquals("dashboard", $view->__get('page'));
        $this->assertArrayHasKey("id", $view->__get('drivers')->toArray()[0]);
    }
}

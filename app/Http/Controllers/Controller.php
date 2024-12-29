<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Jobs\DummyWait5Job;
use Illuminate\Support\Facades\Bus;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dispatchDummy() {

        Bus::chain([
            new DummyWait5Job(),
            new DummyWait5Job(),
            new DummyWait5Job()
        ])->dispatch();

        /*dispatch((new DummyWait5Job())->onQueue('low')->chain([
            new DummyWait5Job(),
            new DummyWait5Job(),
            new DummyWait5Job()
        ]));
        dispatch(new DummyWait5Job())->onQueue('high');
        return response()->json(['status' => 'Job dispatched!']);*/
    }
    
}

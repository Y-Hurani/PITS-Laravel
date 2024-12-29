<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Jobs\DummyWait5Job;
use App\Jobs\DummyWait7Job;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dispatchDummy() {

        Bus::batch([
            (new DummyWait5Job())->onQueue('low'),
            (new DummyWait5Job())->onQueue('low'),
            (new DummyWait5Job())->onQueue('low'),
            (new DummyWait5Job())->onQueue('low')
        ])->then(function () {
            dispatch((new DummyWait7Job())->onQueue('low'));
        })->catch(function ($exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        })->finally(function () {
            Log::info('Batch has been completed!');
        })->dispatch();
    
        return response()->json(['status' => 'Batch of jobs dispatched!']);
    }

        /*dispatch((new DummyWait5Job())->onQueue('low')->chain([
            new DummyWait5Job(),
            new DummyWait5Job(),
            new DummyWait5Job()
        ]));
        dispatch(new DummyWait5Job())->onQueue('high');
        return response()->json(['status' => 'Job dispatched!']);*/
    }

<?php

namespace App\Handlers;

use App\Services\Sort\BubbleSortService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoggerHandler implements LoggerHandlerInterface
{

    private $BubbleSortService;

    public function __construct()
    {
        $this->BubbleSortService = new BubbleSortService();
    }

    public function handle(Request $request):void
    {
        $time_start = new \DateTime('now');
        Log::info('Начал работать в '. $time_start->format('H:i:s:u'));

        $array = [1, 2, 3, 5, 6 ,8 , 1, 12, 15, 18, 1,2 ,3 ,4, 6, 13, 15 , 17 ];

        echo implode(',' ,$this->BubbleSortService->sort($array));


        Log::debug('Затрачено памяти '. memory_get_usage());
        $time_end = new \DateTime('now');
        Log::info('Закончил работать в '. $time_end->format('H:i:s:u'));
    }
}

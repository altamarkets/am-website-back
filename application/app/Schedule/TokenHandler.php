<?php

namespace App\Schedule;

use App\Models\Token;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class TokenHandler
{
    public function __invoke()
    {
        Log::info(__METHOD__, ['TokenHandler/start']); //DELETE
        Token::where('created_at', '<', Carbon::today())->delete();
    }
}

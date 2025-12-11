<?php

namespace App\Schedule;

use App\Events\FormSubmitEvent;
use App\Models\FormSubmit;
use Illuminate\Support\Facades\Log;

class FormSubmitHandler
{
    private const PARSE_COUNT = 20;

    public function __invoke()
    {
        Log::info(__METHOD__, ['FormSubmitHandler/start']); //DELETE
        $submits = self::getSubmits();

        foreach ($submits as $submit) {
            Log::info(__METHOD__, ['FormSubmitHandler/id: ' . $submit->id]); //DELETE
            Log::info(__METHOD__, ['FormSubmitHandler/uuid: ' . $submit->uuid]); //DELETE
            Log::info(__METHOD__, ['FormSubmitHandler/client_id: ' . $submit->client_id]); //DELETE
            Log::info(__METHOD__, ['FormSubmitHandler/payload: ' . $submit->payload]); //DELETE

            event(new FormSubmitEvent($submit->uuid));
            $submit->processed = true;
            $submit->save();
        }
    }

    private static function getSubmits()
    {
        return FormSubmit::whereProcessed(false)
            ->orderBy('id', 'asc')
            ->take(self::PARSE_COUNT)
            ->get();
    }
}

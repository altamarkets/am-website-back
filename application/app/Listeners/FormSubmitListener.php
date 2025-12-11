<?php

namespace App\Listeners;

use App\Events\FormSubmitEvent;
use App\Mail\FormSubmitMail;
use App\Models\FormSubmit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class FormSubmitListener implements ShouldQueue
{
    public function __construct()
    {}

    public function handle(FormSubmitEvent $event): void
    {
        if ($submit = FormSubmit::whereUuid($event->form_submit_uuid)->first()) {
            $SUBMIT_PAYLOAD   = json_decode($submit->payload);
            $FIRST_NAME       = $SUBMIT_PAYLOAD->first_name;
            $LAST_NAME        = $SUBMIT_PAYLOAD->last_name;
            $EMAIL            = $SUBMIT_PAYLOAD->email;
            $PHONE            = $SUBMIT_PAYLOAD->phone;
            $BEST_EXECUTION   = $SUBMIT_PAYLOAD->best_execution;
            $CUSTOM_EXECUTION = $SUBMIT_PAYLOAD->custom_execution;
            $MESSAGE          = $SUBMIT_PAYLOAD->message;

            Mail::to(config('services.mail.receiver'))->send(new FormSubmitMail(
                $FIRST_NAME,
                $LAST_NAME,
                $EMAIL,
                $PHONE,
                $BEST_EXECUTION,
                $CUSTOM_EXECUTION,
                $MESSAGE
            ));
            $submit->delete();
        } else {
            Log::error(__METHOD__, ["$event->form_submit_uuid is not found in database"]);
        }
    }
}

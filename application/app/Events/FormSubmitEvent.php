<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FormSubmitEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $form_submit_uuid;

    public function __construct($form_submit_uuid)
    {
        $this->form_submit_uuid = $form_submit_uuid;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}

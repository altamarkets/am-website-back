<?php

namespace App\Console;

use App\Schedule\FormSubmitHandler;
use App\Schedule\TokenHandler;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(new FormSubmitHandler)
            ->name('form_submit_handler')
            ->withoutOverlapping()
            ->everyMinute();

        $schedule->call(new TokenHandler)
            ->name('token_handler')
            ->withoutOverlapping()
            ->everyMinute();
    }

    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');
        require base_path('routes/console.php');
    }
}

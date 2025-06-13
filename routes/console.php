<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
    \App\Console\Commands\SetupApplication::class::handle();
})->purpose('Display an inspiring quote');

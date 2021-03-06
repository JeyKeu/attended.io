<?php

use App\Models\Attendance;
use App\Models\Event;
use App\Models\User;

$factory->define(Attendance::class, function () {
    return [
        'user_id' => factory(User::class),
        'event_id' => factory(Event::class),
    ];
});

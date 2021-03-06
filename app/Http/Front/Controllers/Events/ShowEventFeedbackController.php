<?php

namespace App\Http\Front\Controllers\Events;

use App\Models\Event;

class ShowEventFeedbackController
{
    public function __invoke(Event $event)
    {
        $event->load([
            'reviews',
            'reviews.user',
        ]);

        return view('front.events.show-feedback', compact('event'));
    }
}

<?php

namespace App\Actions;

use App\Models\Event;
use App\Models\Interfaces\Reviewable;
use App\Models\Slot;
use App\Models\User;
use Exception;

class StoreReviewAction
{
    public function execute(User $user, Reviewable $reviewable, array $reviewAttributes)
    {
        $reviewable->reviews()->create([
            'user_id' => $user->id,
            'rating' => $reviewAttributes['rating'] ?? null,
            'remarks' => $reviewAttributes['remarks'] ?? null,
        ]);

        (new RecalculateReviewStatisticsAction())->execute($reviewable);

        (new AttendEventAction())->execute($user, $this->getEvent($reviewable));
    }

    protected function getEvent(Reviewable $reviewable): Event
    {
        if ($reviewable instanceof Event) {
            return $reviewable;
        }

        if ($reviewable instanceof Slot) {
            return $reviewable->event;
        }

        throw new Exception("Could not determine event from reviewable");
    }
}

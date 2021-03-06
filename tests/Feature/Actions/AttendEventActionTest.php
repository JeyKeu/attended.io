<?php

namespace Tests\Feature\Actions;

use App\Actions\AttendEventAction;
use App\Models\Event;
use App\Models\User;
use Tests\TestCase;

class AttendEventActionTest extends TestCase
{
    /** @test */
    public function it_can_add_a_user_from_the_attendees_of_an_event()
    {
        $user = factory(User::class)->create();
        $event = factory(Event::class)->create();

        $this->assertFalse($user->attended($event));

        (new AttendEventAction())->execute($user, $event);

        $this->assertTrue($user->attended($event));
    }
}

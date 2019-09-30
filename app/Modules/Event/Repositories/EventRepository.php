<?php

namespace App\Modules\Event\Repositories;

use App\Modules\Event\Event;
use App\Repositories\AbstractInterface;

interface EventRepository extends AbstractInterface {

    public function getUpcomingEvents();
    public function getPastEvents();
    public function registerForEvent($event);
    public function deRegisterFromEvent($event);

}

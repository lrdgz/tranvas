<?php

namespace App\Modules\Event\Repositories;

use App\Repositories\AbstractInterface;

interface EventRepository extends AbstractInterface {

    public function getUpcomingEvents();
    public function getPastEvents();

}

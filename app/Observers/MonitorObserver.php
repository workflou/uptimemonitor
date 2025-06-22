<?php

namespace App\Observers;

use App\Models\Monitor;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class MonitorObserver
{
    public function creating(Monitor $monitor): void
    {
        $monitor->uuid = Uuid::uuid4()->toString();
        $monitor->user_id ??= Auth::id();
    }
}

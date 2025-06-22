<?php

use App\Filament\Resources\Monitors\MonitorResource;
use App\Filament\Resources\Monitors\Pages\ViewMonitor;
use App\Models\Monitor;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

test('guests cannot view monitors', function () {
    $monitor = Monitor::factory()->create();

    get(MonitorResource::getUrl('view', ['record' => $monitor]))
        ->assertRedirect('/login');
});

test('users who did not create the record cannot view monitors', function () {
    $monitor = Monitor::factory()->create();

    actingAs(User::factory()->create());
    livewire(ViewMonitor::class, ['record' => $monitor->uuid])
        ->assertForbidden();
});

test('monitor authors can view the record', function () {
    $monitor = Monitor::factory()->create();

    actingAs($monitor->user);
    livewire(ViewMonitor::class, ['record' => $monitor->uuid])
        ->assertOk();
});

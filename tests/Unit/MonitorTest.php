<?php

use App\Models\Monitor;
use App\Models\User;

use function Pest\Laravel\assertDatabaseHas;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotNull;
use function PHPUnit\Framework\assertStringContainsString;

it('has url', function () {
    $monitor = Monitor::factory()->create();

    assertNotNull($monitor->url);
});

it('belongs to the user', function () {
    $monitor = Monitor::factory()->create();

    assertDatabaseHas('users', [
        'id' => $monitor->user_id,
    ]);
});

it('can be created', function () {
    Monitor::create([
        'url' => $url = 'https://example.com',
        'user_id' => $userId = User::factory()->create()->id,
    ]);

    assertDatabaseHas('monitors', [
        'url' => $url,
        'user_id' => $userId,
    ]);
});

it('is routed via uuid', function () {
    $monitor = Monitor::factory()->create();

    assertEquals('uuid', $monitor->getRouteKeyName());
    assertStringContainsString('-', $monitor->getRouteKey());
});

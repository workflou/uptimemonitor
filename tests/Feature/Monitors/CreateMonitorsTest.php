<?php

use App\Filament\Resources\Monitors\MonitorResource;
use App\Filament\Resources\Monitors\Pages\CreateMonitor;
use App\Filament\Resources\Monitors\Pages\ListMonitors;
use App\Models\Monitor;
use App\Models\User;
use Filament\Actions\CreateAction;
use Illuminate\Contracts\Auth\Authenticatable;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

test('guests cannot create monitors', function () {
    get('/monitors')
        ->assertRedirect('/login');
});

test('url validation', function (?string $url) {
    actingAs(User::factory()->create());

    livewire(ListMonitors::class)
        ->callAction(CreateAction::class, [
            'url' => $url,
        ])
        ->assertHasFormErrors(['url']);
})->with([
    null,
    'invalid',
]);

test('monitor can be created', function (string $url, string $expected) {
    actingAs($user = User::factory()->create());

    livewire(ListMonitors::class)
        ->callAction(CreateAction::class, [
            'url' => $url,
        ])
        ->assertNotified()
        ->assertHasNoErrors();

    assertDatabaseHas('monitors', [
        'user_id' => $user->id,
        'url' => $expected,
    ]);
})->with([
    ['https://example.com', 'https://example.com'],
    ['http://example.com/test', 'http://example.com/test'],
]);

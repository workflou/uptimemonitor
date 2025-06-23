<?php

namespace App\Filament\Resources\Monitors\Pages;

use App\Filament\Resources\Monitors\MonitorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMonitors extends ListRecords
{
    protected static string $resource = MonitorResource::class;
    protected ?string $subheading = 'Each record represents a URL to be monitored';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->slideOver(),
        ];
    }
}

<?php

namespace App\Filament\Resources\Monitors\Pages;

use App\Filament\Resources\Monitors\MonitorResource;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Uri;

class ViewMonitor extends ViewRecord
{
    protected static string $resource = MonitorResource::class;

    public function getTitle(): string | Htmlable
    {
        return Uri::of($this->record->url)->host();
    }

    protected function getHeaderActions(): array
    {
        return [
            ActionGroup::make([
                EditAction::make(),
                DeleteAction::make(),
            ]),
        ];
    }
}

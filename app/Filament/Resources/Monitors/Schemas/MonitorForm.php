<?php

namespace App\Filament\Resources\Monitors\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class MonitorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('url')
                    ->label('Website')
                    ->required()
                    ->columnSpanFull()
                    ->prefixIcon(Heroicon::OutlinedGlobeAlt)
                    ->placeholder('https://example.com/test/123')
                    ->url(),
            ]);
    }
}
